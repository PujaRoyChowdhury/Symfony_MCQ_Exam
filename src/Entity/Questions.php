<?php

namespace App\Entity;

use App\Repository\QuestionsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QuestionsRepository::class)]
class Questions
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $ques;

    #[ORM\Column(type: 'string', length: 255)]
    private $a;

    #[ORM\Column(type: 'string', length: 255)]
    private $b;

    #[ORM\Column(type: 'string', length: 255)]
    private $c;

    #[ORM\Column(type: 'string', length: 255)]
    private $d;

    #[ORM\Column(type: 'string', length: 255)]
    private $ans;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getQues(): ?string
    {
        return $this->ques;
    }

    public function setQues(string $ques): self
    {
        $this->ques = $ques;

        return $this;
    }

    public function getA(): ?string
    {
        return $this->a;
    }

    public function setA(string $a): self
    {
        $this->a = $a;

        return $this;
    }

    public function getB(): ?string
    {
        return $this->b;
    }

    public function setB(string $b): self
    {
        $this->b = $b;

        return $this;
    }

    public function getC(): ?string
    {
        return $this->c;
    }

    public function setC(string $c): self
    {
        $this->c = $c;

        return $this;
    }

    public function getD(): ?string
    {
        return $this->d;
    }

    public function setD(string $d): self
    {
        $this->d = $d;

        return $this;
    }

    public function getAns(): ?string
    {
        return $this->ans;
    }

    public function setAns(string $ans): self
    {
        $this->ans = $ans;

        return $this;
    }
}
