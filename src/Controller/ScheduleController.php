<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ScheduleController extends AbstractController
{
    #[Route('/schedule', name: 'app_schedule')]
    public function index(): Response
    {
        //return $this->render('schedule/index.html.twig', [
           // 'controller_name' => 'ScheduleController',
        //]);

        $timeSlots = [
            '9:00 AM - 10:00 AM',
            '10:00 AM - 11:00 AM',
            '11:00 AM - 12:00 PM',
            '12:00 AM - 13:00 AM',
            '13:00 AM - 14:00 AM',
            '14:00 AM - 15:00 PM',
            '15:00 AM - 16:00 PM',
            // Add more time slots as needed
        ];
            return $this->render('schedule/index.html.twig', [
                'timeSlots' => $timeSlots,
            ]);
    }
}
