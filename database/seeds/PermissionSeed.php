<?php

use Illuminate\Database\Seeder;

class PermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'title' => 'user_management_access',],
            ['id' => 2, 'title' => 'permission_access',],
            ['id' => 3, 'title' => 'permission_create',],
            ['id' => 4, 'title' => 'permission_edit',],
            ['id' => 5, 'title' => 'permission_view',],
            ['id' => 6, 'title' => 'permission_delete',],
            ['id' => 7, 'title' => 'role_access',],
            ['id' => 8, 'title' => 'role_create',],
            ['id' => 9, 'title' => 'role_edit',],
            ['id' => 10, 'title' => 'role_view',],
            ['id' => 11, 'title' => 'role_delete',],
            ['id' => 12, 'title' => 'user_access',],
            ['id' => 13, 'title' => 'user_create',],
            ['id' => 14, 'title' => 'user_edit',],
            ['id' => 15, 'title' => 'user_view',],
            ['id' => 16, 'title' => 'user_delete',],
            ['id' => 17, 'title' => 'user_action_access',],
            ['id' => 18, 'title' => 'user_action_create',],
            ['id' => 19, 'title' => 'user_action_edit',],
            ['id' => 20, 'title' => 'user_action_view',],
            ['id' => 21, 'title' => 'user_action_delete',],
            ['id' => 22, 'title' => 'faq_management_access',],
            ['id' => 23, 'title' => 'faq_management_create',],
            ['id' => 24, 'title' => 'faq_management_edit',],
            ['id' => 25, 'title' => 'faq_management_view',],
            ['id' => 26, 'title' => 'faq_management_delete',],
            ['id' => 27, 'title' => 'faq_category_access',],
            ['id' => 28, 'title' => 'faq_category_create',],
            ['id' => 29, 'title' => 'faq_category_edit',],
            ['id' => 30, 'title' => 'faq_category_view',],
            ['id' => 31, 'title' => 'faq_category_delete',],
            ['id' => 32, 'title' => 'faq_question_access',],
            ['id' => 33, 'title' => 'faq_question_create',],
            ['id' => 34, 'title' => 'faq_question_edit',],
            ['id' => 35, 'title' => 'faq_question_view',],
            ['id' => 36, 'title' => 'faq_question_delete',],
            ['id' => 37, 'title' => 'activity_access',],
            ['id' => 38, 'title' => 'activity_create',],
            ['id' => 39, 'title' => 'activity_edit',],
            ['id' => 40, 'title' => 'activity_view',],
            ['id' => 41, 'title' => 'activity_delete',],
            ['id' => 42, 'title' => 'contact_category_access',],
            ['id' => 43, 'title' => 'contact_category_create',],
            ['id' => 44, 'title' => 'contact_category_edit',],
            ['id' => 45, 'title' => 'contact_category_view',],
            ['id' => 46, 'title' => 'contact_category_delete',],
            ['id' => 47, 'title' => 'contact_access',],
            ['id' => 48, 'title' => 'contact_create',],
            ['id' => 49, 'title' => 'contact_edit',],
            ['id' => 50, 'title' => 'contact_view',],
            ['id' => 51, 'title' => 'contact_delete',],
            ['id' => 52, 'title' => 'document_access',],
            ['id' => 53, 'title' => 'document_create',],
            ['id' => 54, 'title' => 'document_edit',],
            ['id' => 55, 'title' => 'document_view',],
            ['id' => 56, 'title' => 'document_delete',],
            ['id' => 57, 'title' => 'metric_access',],
            ['id' => 58, 'title' => 'partners_metric_access',],
            ['id' => 59, 'title' => 'partners_metric_create',],
            ['id' => 60, 'title' => 'partners_metric_edit',],
            ['id' => 61, 'title' => 'partners_metric_view',],
            ['id' => 62, 'title' => 'partners_metric_delete',],
            ['id' => 63, 'title' => 'projects_metric_access',],
            ['id' => 64, 'title' => 'projects_metric_create',],
            ['id' => 65, 'title' => 'projects_metric_edit',],
            ['id' => 66, 'title' => 'projects_metric_view',],
            ['id' => 67, 'title' => 'projects_metric_delete',],
            ['id' => 68, 'title' => 'project_access',],
            ['id' => 69, 'title' => 'project_create',],
            ['id' => 70, 'title' => 'project_edit',],
            ['id' => 71, 'title' => 'project_view',],
            ['id' => 72, 'title' => 'project_delete',],
            ['id' => 73, 'title' => 'publication_access',],
            ['id' => 74, 'title' => 'publication_create',],
            ['id' => 75, 'title' => 'publication_edit',],
            ['id' => 76, 'title' => 'publication_view',],
            ['id' => 77, 'title' => 'publication_delete',],
            ['id' => 78, 'title' => 'deliverable_access',],
            ['id' => 79, 'title' => 'deliverable_create',],
            ['id' => 80, 'title' => 'deliverable_edit',],
            ['id' => 81, 'title' => 'deliverable_view',],
            ['id' => 82, 'title' => 'deliverable_delete',],
            ['id' => 83, 'title' => 'calendar_access',],
            ['id' => 84, 'title' => 'calendar_create',],
            ['id' => 85, 'title' => 'calendar_edit',],
            ['id' => 86, 'title' => 'calendar_view',],
            ['id' => 87, 'title' => 'calendar_delete',],

        ];

        foreach ($items as $item) {
            \App\Permission::create($item);
        }
    }
}
