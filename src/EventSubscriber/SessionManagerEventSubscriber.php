<?php

namespace Drupal\session_manager\EventSubscriber;

use Drupal\session_manager\Event\SessionManagerUserLoginEvent;
use Drupal\session_manager\Event\SessionManagerUserLogoutEvent;
use Drupal\session_manager\SessionManagerService;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * Class SessionManagerEventSubscriber.
 */
class SessionManagerEventSubscriber implements EventSubscriberInterface {

  /**
   * @var \Drupal\session_manager\SessionManagerService
   */
  protected $SessionManagerService;

  /**
   * Constructs a new SessionManagerEventSubscriber object.
   */
  public function __construct(SessionManagerService $session_manager) {
    $this->SessionManagerService = $session_manager;
  }

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() {
    $events[SessionManagerUserLoginEvent::EVENT_NAME] = ['prepareSessionInfo'];
    $events[SessionManagerUserLogoutEvent::EVENT_NAME] = ['removeSessionInfo'];
//    $events[KernelEvents::REQUEST] = ['currentSession'];

    return $events;
  }

  /**
   * User login event callback.
   *
   * This method is called whenever the session_manager_user_login
   * event is dispatched.
   *
   * @param \Symfony\Component\EventDispatcher\Event $event
   *   Event object.
   */
  public function prepareSessionInfo(Event $event) {
    $this->SessionManagerService->setSessionInfo();
  }

  public function removeSessionInfo(Event $event) {
    $this->SessionManagerService->removeSessionInfo();
  }

  public function currentSession(Event $event) {
  }

}
