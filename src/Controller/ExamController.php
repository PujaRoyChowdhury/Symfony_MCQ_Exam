<?php

namespace App\Controller;

use App\Entity\Questions;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class ExamController extends AbstractController
{
    #[Route('/result', name: 'result')]
    public function result(EntityManagerInterface $entityManager, Request $request)
    {
        $questions = $entityManager->getRepository(Questions::class)->findAll();
        $fetchedAnswer = $request->get('ques');
        $count=0;
        foreach($questions as $question)
        {
            foreach($fetchedAnswer as $answer)
            {
                if($question->getAns() === $answer)
                {
                    $count++;
                }
            }
        }
        dd($count);
    }
}
