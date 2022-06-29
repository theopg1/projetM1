<?php

namespace App\Security;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Security\Http\Authorization\AccessDeniedHandlerInterface;

class AccessDeniedHandler implements AccessDeniedHandlerInterface
{
    private $router;
    
    
    public function __construct(RouterInterface $router, SessionInterface $session)
    {
        $this->router = $router;
        $this->session = $session;
    }
  
    public function handle(Request $request, AccessDeniedException $accessDeniedException)
    {
        // $request->getSession()->get
        $this->session->getFlashbag()->add('unauthorized', 'You are not authorized to access the admin page');
        $url = $this->router->generate('backlogin');
        
        return new RedirectResponse($url);
    }
    
}