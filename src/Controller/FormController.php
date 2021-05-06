<?php

namespace App\Controller;

use App\Form\TextChangerType;

use App\services\Capitalizer;
use App\services\InputProcessor;
use App\services\Logger;
use App\services\SpaceDasher;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FormController extends AbstractController
{

    #[Route('/', name: 'form')]
    public function index(Request $request): Response
    {
        $capitalizer = new Capitalizer();
        $spaceDasher = new SpaceDasher();
        $logger = new Logger();

        $form = $this->createForm(TextChangerType::class);

        $form->handleRequest($request);

        if($form->isSubmitted()){

          if($request->get('text_changer')['transform'] === 'Capitalizer'){
              $handle = new InputProcessor($request->get('text_changer')['text'],$capitalizer,$logger);
          }
          if($request->get('text_changer')['transform'] === 'SpaceDasher'){
              $handle = new InputProcessor($request->get('text_changer')['text'],$spaceDasher,$logger);
          }

          var_dump($handle->getInput());
        }

        return $this->render('form/index.html.twig', [
            'controller_name' => 'FormController',
            'form' => $form->createView()

        ]);
    }
}
