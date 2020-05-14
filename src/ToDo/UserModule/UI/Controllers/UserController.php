<?php


namespace App\ToDo\UserModule\UI\Controllers;


use App\ToDo\CommonModule\Controller\CommonControllerTrait;
use App\ToDo\UserModule\Application\SingUp\Command\SingUp;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Messenger\Stamp\HandledStamp;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Messenger\MessageBusInterface;
//use Ramsey\Uuid\Uuid;

final class UserController extends AbstractController
{
    use CommonControllerTrait {
        CommonControllerTrait::__construct as responseConstructor;
    }

    /**
     * @var MessageBusInterface
     */
    private $bus;

    /**
     * UserController constructor.
     * @param MessageBusInterface $bus
     */
    public function __construct(MessageBusInterface $bus)
    {
        $this->responseConstructor($bus);
    }

    /**
     * @return JsonResponse
     * @Route("/test", name="test", methods={"GET"})
     */
    public function index(): JsonResponse
    {
        return $this->json(['user' => "work/"], 200);
    }

    /**
     * @return JsonResponse
     * @Route("/sing-up", name="sing-up", methods={"GET"})
     */
    public function singUp(): JsonResponse
    {
        $handleResult = $this->getResultHandler(new SingUp($this->data()));

        return $this->json(
            $this->prepareResponse($handleResult),
            $handleResult->getStatusCode()
        );

//        $envelope = $this->bus->dispatch(new SingUp($this->data()));
//        $handledStamp = $envelope->last(HandledStamp::class);
        //return $this->response($handleResult);
        //return $this->json(['result' => $handleResult->getErrors()], 200); //['user' => 'work/'], 200 //$handledStamp->getResult()->getErrors()
    }

    /**
     * @return array
     */
    private function data(): array
    {
        return [
            "email" => "test@gmail.com", //"test@gmail.com"
            "password" => "test-password12", //"test-password12"
            "password_repeat" => "test-password12"
        ];
    }
}