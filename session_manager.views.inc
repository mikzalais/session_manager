<?php

/**
 * Implements hook_views_data().
 */
function session_manager_views_data() {
  return [
    'sessions' => [
      'table' => [
        'group' => t('Sessions'),
        'base' => [
          'field' => 'sid',
          'title' => t('Sessions'),
          'help' => t('Contains session data and can be related to users.'),
        ],
      ],
      'uid' => [
        'title' => t('User ID'),
        'help' => t('Relate sessions data to a user'),
        'relationship' => [
          'base' => 'users_field_data',
          'base field' => 'uid',
          'id' => 'standard',
          'label' => t('User'),
        ],
        'field' => [
          'id' => 'numeric',
        ],
        'sort' => [
          'id' => 'standard',
        ],
        'filter' => [
          'id' => 'numeric',
        ],
        'argument' => [
          'id' => 'numeric',
        ],
      ],
      'sid' => [
        'title' => t('Session ID'),
        'help' => t('ID of the session'),
        'field' => [
          'id' => 'standard',
        ],
        'sort' => [
          'id' => 'standard',
        ],
        'filter' => [
          'id' => 'string',
        ],
        'argument' => [
          'id' => 'string',
        ],
      ],
      'hostname' => [
        'title' => t('IP address'),
        'help' => t('IP address associated with the session'),
        'field' => [
          'id' => 'standard',
        ],
        'sort' => [
          'id' => 'standard',
        ],
        'filter' => [
          'id' => 'string',
        ],
        'argument' => [
          'id' => 'string',
        ],
      ],
      'timestamp' => [
        'title' => t('Timestamp'),
        'help' => t('Session creation timestamp'),
        'field' => [
          'id' => 'date',
        ],
        'sort' => [
          'id' => 'date',
        ],
        'filter' => [
          'id' => 'date',
        ],
      ],
    ],
    'session_manager' => [
      'table' => [
        'group' => t('Session Manager'),
        'join' => [
          'sessions' => [
            'left_field' => 'sid',
            'field' => 'sid',
          ],
        ],
      ],
      'user_agent' => [
        'title' => t('User-Agent'),
        'help' => t('User Agent information'),
        'field' => [
          'id' => 'standard',
        ],
        'sort' => [
          'id' => 'standard',
        ],
        'filter' => [
          'id' => 'string',
        ],
      ],
    ],
  ];
}
