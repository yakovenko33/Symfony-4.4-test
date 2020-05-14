<?php


namespace App\ToDo\CommonModule\Controller;


use App\ToDo\CommonModule\Bus\Interfaces\CommandInterface;
use App\ToDo\CommonModule\Bus\Result\ResultHandlerInterface;
use App\ToDo\UserModule\Application\SingUp\Command\SingUp;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Stamp\HandledStamp;

trait CommonControllerTrait
{
    /**
     * @var
     */
    private $bus;

    /**
     * Response constructor.
     * @param MessageBusInterface $bus
     */
    public function __construct(MessageBusInterface $bus)
    {
        $this->bus = $bus;
    }

    /**
     * @param ResultHandlerInterface $resultHandler
     * @return array
     */
    protected function prepareResponse(ResultHandlerInterface $resultHandler): array
    {
        return [
            'result' => $resultHandler->hasErrors() ?  $resultHandler->getErrors() : $resultHandler->getResult(),
            'status' => $resultHandler->hasErrors() ? 'errors' : 'success',
        ];
    }

    /**
     * @param CommandInterface $command
     * @return ResultHandlerInterface
     */
    protected function getResultHandler(CommandInterface $command): ResultHandlerInterface
    {
        return $this->bus->dispatch($command)
            ->last(HandledStamp::class)
            ->getResult();
    }
}