<?php

namespace App\Controller;
use App\Entity\Questions;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class QuestionController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home()
    {
        $users = ['a','b','c','d'];
        return $this->render('question/home.html.twig',[
            'users' => $users,
        ]);
    }
    /**
     * @Route("/startexam", name="startexam")
     */
    public function startexam()
    {
        $users = ['a','b','c','d'];
        return $this->render('question/startexam.html.twig');
    }
    /**
     * @Route("/exampage", name="exampage")
     */
    public function exampage()
    {
        return $this->render('question/exampage.html.twig');
    }
    /**
     * @Route("/finishexam", name="finishexam")
     */
    public function finishexam()
    {
        return $this->render('question/finishexam.html.twig');
    }
    /**
     * @Route("/questionpage", name="questionpage")
     */
    public function questionpage()
    {
        return $this->render('question/questionpage.html.twig');
    }
    /**
     * @Route("/addquestion", name="addquestion")
     */
    public function addquestion()
    {
        return $this->render('question/addquestion.html.twig');
    }
    /**
     * @Route("/addquestion2", name="addquestion2" , methods="POST")
     */
    public function addquestion2(EntityManagerInterface $entityManager ,Request $request)
    {
        $questions = new Questions();
        $questionName =$request->get('question');
        $a =$request->get('a');
        $b =$request->get('b');
        $c =$request->get('c');
        $d =$request->get('d');
        $ans =$request->get('ans');

        $questions->setQues($questionName);
        $questions->setA($a);
        $questions->setB($b);
        $questions->setC($c);
        $questions->setD($d);
        $questions->setAns($ans);
        
        $entityManager->persist($questions);
        $entityManager->flush();
        
        return $this->redirectToRoute('addquestion');
    }
    /**
     * @Route("/editpage", name="editpage")
     */
    public function editpage()
    {
        return $this->render('question/editpage.html.twig');
    }
}
