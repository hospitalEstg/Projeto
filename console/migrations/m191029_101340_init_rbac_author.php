<?php

use yii\db\Migration;

/**
 * Class m191029_101340_init_rbac_author
 */
class m191029_101340_init_rbac_author extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
    $auth= yii::$app->authManager;
    // 1- criar permissoes

     // add "createPost" permission
            $createPost = $auth->createPermission('createPost');
            $createPost->description = 'Create a post';
            $auth->add($createPost);

     // add "updatePost"
                 $updatePost = $auth->createPermission('updatePost');
                 $updatePost->description = 'Update a post';
                 $auth->add($updatePost);



    // 2- criar roles (ou perfis)


    // add "author" role and give this role the "createPost" permission
        $author = $auth->createRole('author');
        $auth->add($author);
        $auth->addChild($author, $createPost);

 // add "admin" role and give this role the "createPost" permission
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $author);


                     $auth->addChild($admin, $updatePost);

    // 3- associar utilizadores a roles
    // Assign roles to users.2 are IDs returned by IdentityInterface::getId()

            $auth->assign($author, 2);
            $auth->assign($admin, 1);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    $auth= yii::$app->authManager;
    $auth->removeAll();
        echo "m191029_101340_init_rbac_author cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191029_101340_init_rbac_author cannot be reverted.\n";

        return false;
    }
    */
}
