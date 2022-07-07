<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\RateLimiter\RateLimiterFactory;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(RateLimiterFactory $customThingLimiter, Request $request): Response
    {
        $limiter = $customThingLimiter->create($request->getClientIp());
        $limit = $limiter->consume();

        if (false === $limit->isAccepted()) {
            dump('not accepted');
        }

        return $this->render('home/index.html.twig', [
            'remaining' => $limit->getRemainingTokens(),
            'retryAfter' => $limit->getRetryAfter(),
            'limit' => $limit->getLimit(),
        ]);
    }
}
