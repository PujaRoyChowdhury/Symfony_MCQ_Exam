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

        return $this->render('question/home.html.twig');
    }
    /**
     * @Route("/startexam", name="startexam")
     */
    public function startexam()
    {
        return $this->render('question/startexam.html.twig');
    }
    /**
     * @Route("/exampage", name="exampage")
     */
    public function exampage(EntityManagerInterface $entitymanager)
    {
        $questions = $entitymanager->getRepository(Questions::class)->findAll();
        return $this->render('question/exampage.html.twig',[
        'values'=>$questions,
        ]);
        
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
    public function questionpage(EntityManagerInterface $entityManager)
    {
        $questions = $entityManager->getRepository(Questions::class)->findAll();
        return $this->render('question/questionpage.html.twig',[
        'questions'=>$questions,
        ]);
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
        
        //$this->addFlash('success','Question is added successfully.');

        return $this->redirectToRoute('addquestion');
    }
    /**
     * @Route("/editpage/{id}", name="editpage")
     */
    public function editpage(EntityManagerInterface $entityManager ,$id)
    {
        $questions = $entityManager->getRepository(Questions::class)->findOneBy(['id'=>$id]);
        return $this->render('question/editpage.html.twig',[
        'question'=>$questions,
        ]);
    }
    /**
     * @Route("/update/{id}", name="update", methods="POST")
     */
    public function update(EntityManagerInterface $entityManager ,Request $request,$id)
    {
        $questionName =$request->get('question');
        $a =$request->get('a');
        $b =$request->get('b');
        $c =$request->get('c');
        $d =$request->get('d');
        $ans =$request->get('ans');
//dd($questionName);

        $questions = $entityManager->getRepository(Questions::class)->findOneBy(['id'=>$id]);
        $questions->setQues($questionName);
        $questions->setA($a);
        $questions->setB($b);
        $questions->setC($c);
        $questions->setD($d);
        $questions->setAns($ans);
        
        //$entityManager->persist($questions);
        $entityManager->flush();
        
        return $this->redirectToRoute('questionpage');
    }

    /**
     * @Route("/delete/{id}", name="delete")
     */
    public function delete( EntityManagerInterface $entityManager ,$id)
    {
        $question = $entityManager->getRepository(Questions::class)->findOneBy(['id'=>$id]);
        $entityManager->remove($question);
        $entityManager->flush();
        //return  Response('hello world');
        return $this->redirectToRoute('questionpage');
    }

}
