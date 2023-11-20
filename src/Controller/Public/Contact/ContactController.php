<?php

namespace App\Controller\Public\Contact;

use App\Contract\SendMessageInterface;
use App\Entity\Message;
use App\Form\MessageType;
use App\Repository\CompanyRepository;
use App\Repository\MessageRepository;
use App\Service\SendMessage;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @throws TransportExceptionInterface
     */
    #[Route('/contact', name: 'app_contact')]
    public function index(CompanyRepository $companyRepository,
                          EntityManagerInterface $entityManager,
                          SendMessageInterface $sendMessage,
                          Request $request): Response
    {

        $form = $this->createForm(MessageType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $datas = $form->getData();
            $message = new Message();
            $message->setName($datas->getName());
            $message->setPhone($datas->getPhone());
            $message->setEmail($datas->getEmail());
            $message->setMessage($datas->getMessage());
            $entityManager->persist($message);
            $entityManager->flush();
            $this->addFlash('success', 'Votre message a été envoyé.');

           $sendMessage($datas->getEmail(),$datas->getPhone(), $datas->getMessage());
            return $this->redirectToRoute('app_contact');

        }
        return $this->render('themes/' . $this->getParameter('app.theme') . '/contact/index.html.twig', [
            'company' => $companyRepository->getFirst(),
            'form' => $form->createView()
        ]);
    }
}
