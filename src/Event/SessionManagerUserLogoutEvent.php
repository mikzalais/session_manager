<?php

namespace Drupal\session_manager\Event;

use Drupal\Component\EventDispatcher\Event;

/**
 * Event that is fired when a user logs out.
 */
class SessionManagerUserLogoutEvent extends Event {

  const EVENT_NAME = 'session_manager_user_logout';

}
