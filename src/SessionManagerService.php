<?php

namespace Drupal\session_manager;

use Drupal\Component\Utility\Crypt;
use Drupal\Core\Database\Connection;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

/**
 * Class SessionManagerService.
 */
class SessionManagerService {

  /**
   * Symfony\Component\HttpFoundation\Session\SessionInterface definition.
   *
   * @var \Symfony\Component\HttpFoundation\Session\SessionInterface
   */
  protected $session;

  /**
   * @var \Drupal\Core\Database\Connection
   */
  protected $database;

  /**
   * @var \Symfony\Component\HttpFoundation\RequestStack
   */
  protected $requestStack;

  /**
   * Constructs a new SessionManagerService object.
   */
  public function __construct(SessionInterface $session, Connection $database, RequestStack $request_stack) {
    $this->session = $session;
    $this->database = $database;
    $this->requestStack = $request_stack;
  }

  /**
   * Writes additional session data to database.
   *
   * @throws \Exception
   */
  public function setSessionInfo() {
    $session_id = Crypt::hashBase64($this->session->getId());
    $user_agent = $this->requestStack->getCurrentRequest()->headers->get('User-Agent');
    // Save data to database.
    $query = $this->database->insert('session_manager');
    $query->fields(
      ['sid', 'user_agent'],
      [$session_id, $user_agent]
    );
    $query->execute();
  }

  /**
   * Removes session related data from database.
   */
  public function removeSessionInfo() {
    $session_id = Crypt::hashBase64($this->session->getId());
    // Delete data from database.
    $query = $this->database->delete('session_manager');
    $query->condition('sid', $session_id);
    $query->execute();
  }

}
