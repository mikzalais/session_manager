<?php

namespace Drupal\session_manager\EventSubscriber;

use Drupal\session_manager\Event\SessionManagerUserLoginEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

/**
 * Class SessionManagerEventSubscriber.
 */
class SessionManagerEventSubscriber implements EventSubscriberInterface {

  /**
   * Symfony\Component\HttpFoundation\Session\SessionInterface definition.
   *
   * @var \Symfony\Component\HttpFoundation\Session\SessionInterface
   */
  protected $session;

  /**
   * Constructs a new SessionManagerEventSubscriber object.
   */
  public function __construct(SessionInterface $session) {
    $this->session = $session;
  }

  /**
   * {@inheritdoc}
   */
  public static function getSubscribedEvents() {
    $events[SessionManagerUserLoginEvent::EVENT_NAME] = ['prepareSessionInfo'];

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
    drupal_set_message('Event session_manager_user_login thrown by Subscriber in module session_manager.', 'status', TRUE);
  }

}
