<?php

namespace Drupal\session_manager\Event;

use Drupal\user\UserInterface;
use Drupal\Component\EventDispatcher\Event;

/**
 * Event that is fired when a user logs in.
 */
class SessionManagerUserLoginEvent extends Event {

  const EVENT_NAME = 'session_manager_user_login';

  /**
   * The user account.
   *
   * @var \Drupal\user\UserInterface
   */
  public $account;

  /**
   * Constructs the object.
   *
   * @param \Drupal\user\UserInterface $account
   *   The account of the user logged in.
   */
  public function __construct(UserInterface $account) {
    $this->account = $account;
  }

}
