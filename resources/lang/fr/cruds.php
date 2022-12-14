<?php

return [
    'userManagement' => [
        'title'          => 'Utilisateurs',
        'title_singular' => 'Utilisateurs',
    ],
    'permission'     => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'title'             => 'Titre',
            'title_helper'      => '',
            'created_at'        => 'Créé le',
            'created_at_helper' => '',
            'updated_at'        => 'Maj le',
            'updated_at_helper' => '',
            'deleted_at'        => 'Effacé le',
            'deleted_at_helper' => '',
        ],
    ],
    'role'           => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'title'              => 'Titre',
            'title_helper'       => '',
            'permissions'        => 'Permissions',
            'permissions_helper' => '',
            'created_at'         => 'Créé le',
            'created_at_helper'  => '',
            'updated_at'         => 'Maj le',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Effacé le',
            'deleted_at_helper'  => '',
        ],
    ],
    'user'           => [
        'title'          => 'Utilisateurs',
        'title_singular' => 'Utilisateur',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => '',
            'name'                     => 'Nom',
            'name_helper'              => '',
            'email'                    => 'Email',
            'email_helper'             => '',
            'email_verified_at'        => 'Email vérifié le',
            'email_verified_at_helper' => '',
            'password'                 => 'Mot de passe',
            'password_helper'          => '',
            'roles'                    => 'Roles',
            'roles_helper'             => '',
            'remember_token'           => 'Rappel du Token',
            'remember_token_helper'    => '',
            'created_at'               => 'Créé le',
            'created_at_helper'        => '',
            'updated_at'               => 'Maj le',
            'updated_at_helper'        => '',
            'deleted_at'               => 'Effacé le',
            'deleted_at_helper'        => '',
        ],
    ],
    'status'         => [
        'title'          => 'Status',
        'title_singular' => 'Status',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'name'              => 'Nom',
            'name_helper'       => '',
            'color'             => 'Couleur',
            'color_helper'      => '',
            'created_at'        => 'Créé le',
            'created_at_helper' => '',
            'updated_at'        => 'Maj le',
            'updated_at_helper' => '',
            'deleted_at'        => 'Effacé le',
            'deleted_at_helper' => '',
        ],
    ],
    'priority'       => [
        'title'          => 'Priorités',
        'title_singular' => 'Priorité',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'name'              => 'Nom',
            'name_helper'       => '',
            'color'             => 'Couleur',
            'color_helper'      => '',
            'created_at'        => 'Créé le',
            'created_at_helper' => '',
            'updated_at'        => 'Maj le',
            'updated_at_helper' => '',
            'deleted_at'        => 'Effacé le',
            'deleted_at_helper' => '',
        ],
    ],
    'category'       => [
        'title'          => 'Categories',
        'title_singular' => 'Categorie',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'name'              => 'Nom',
            'name_helper'       => '',
            'color'             => 'Couleur',
            'color_helper'      => '',
            'created_at'        => 'Créé le',
            'created_at_helper' => '',
            'updated_at'        => 'Maj le',
            'updated_at_helper' => '',
            'deleted_at'        => 'Effacé le',
            'deleted_at_helper' => '',
        ],
    ],
    'ticket'         => [
        'title'          => 'Tickets',
        'title_singular' => 'Ticket',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => '',
            'title'                   => 'Titre',
            'title_helper'            => '',
            'content'                 => 'Message',
            'content_helper'          => '',
            'status'                  => 'Status',
            'status_helper'           => '',
            'priority'                => 'Priorité',
            'priority_helper'         => '',
            'category'                => 'Categorie',
            'category_helper'         => '',
            'author_name'             => "Nom de l'auteur",
            'author_name_helper'      => '',
            'author_email'            => "Email de l'auteur",
            'author_email_helper'     => '',
            'assigned_to_user'        => 'Assigné à',
            'assigned_to_user_helper' => '',
            'comments'                => 'Commentaires',
            'comments_helper'         => '',
            'created_at'              => 'Créé le',
            'created_at_helper'       => '',
            'updated_at'              => 'Maj le',
            'updated_at_helper'       => '',
            'deleted_at'              => 'Effacé le',
            'deleted_at_helper'       => '',
            'attachments'             => 'Fichiers',
            'attachments_helper'      => '',
        ],
    ],
    'comment'        => [
        'title'          => 'Commentaires',
        'title_singular' => 'Commentaire',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => '',
            'ticket'              => 'Ticket',
            'ticket_helper'       => '',
            'author_name'         => "Nom de l'auteur",
            'author_name_helper'  => '',
            'author_email'        => "Email de l'auteur",
            'author_email_helper' => '',
            'user'                => 'Utilisateur',
            'user_helper'         => '',
            'comment_text'        => 'Commentaire',
            'comment_text_helper' => '',
            'created_at'          => 'Créé le',
            'created_at_helper'   => '',
            'updated_at'          => 'Maj le',
            'updated_at_helper'   => '',
            'deleted_at'          => 'Effacé le',
            'deleted_at_helper'   => '',
        ],
    ],
    'auditLog'       => [
        'title'          => 'Audit Logs',
        'title_singular' => 'Audit Log',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => '',
            'description'         => 'Description',
            'description_helper'  => '',
            'subject_id'          => 'ID du sujet',
            'subject_id_helper'   => '',
            'subject_type'        => 'Type de sujet',
            'subject_type_helper' => '',
            'user_id'             => "ID de l'utilisateur",
            'user_id_helper'      => '',
            'properties'          => 'Propriétés',
            'properties_helper'   => '',
            'host'                => 'Hôte',
            'host_helper'         => '',
            'created_at'          => 'Créé le',
            'created_at_helper'   => '',
            'updated_at'          => 'Maj le',
            'updated_at_helper'   => '',
        ],
    ],
];
