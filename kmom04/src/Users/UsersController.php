<?php


namespace Anax\Users;
 
/**
 * A controller for users and admin related events.
 *
 */
class UsersController implements \Anax\DI\IInjectionAware
{
    use \Anax\DI\TInjectable;


	/**
	 * Initialize the controller.
	 *
	 * @return void
	 */
	public function initialize()
	{
	    $this->users = new \Anax\Users\User();
	    $this->users->setDI($this->di);
	}


    /**
     * Reset and setup database tabel with default users.
     *
     * @return void
     */
    public function setupAction() {
 
        $this->theme->setTitle("Reset and setup database with default users.");

        $table = [
                'id' => ['integer', 'primary key', 'not null', 'auto_increment'],
                'acronym' => ['varchar(20)', 'unique', 'not null'],
                'email' => ['varchar(80)'],
                'name' => ['varchar(80)'],
                'password' => ['varchar(255)'],
                'created' => ['datetime'],
                'updated' => ['datetime'],
                'deleted' => ['datetime'],
                'active' => ['datetime'],
        ];

           $res = $this->users->setupTable($table);

        // Add some users 
        $now = date(DATE_RFC2822);
 
        $this->users->create([
            'acronym' => 'admin',
            'email' => 'admin@admin.com',
            'name' => 'Administrator',
            'password' => password_hash('admin', PASSWORD_DEFAULT),
            'created' => $now,
            'active' => $now,
        ]);

        $this->users->create([
            'acronym' => 'doe',
            'email' => 'doe@istasty.com',
            'name' => 'John Doe',
            'password' => password_hash('doe', PASSWORD_DEFAULT),
            'created' => $now,
            'active' => $now,
        ]);
     
        $url = $this->url->create('users/list');
        $this->response->redirect($url);
    }



	/**
	 * List all users.
	 *
	 * @return void
	 */
	public function listAction() {
	    $all = $this->users->findAll();
	 
	    $this->theme->setTitle("List all users");
	    $this->views->add('users/list-all', [
	        'users' => $all,
	        'title' => "View all users",
	    ]);
	}


	/**
	 * List user with id.
	 *
	 * @param int $id of user to display
	 *
	 * @return void
	 */
	public function idAction($id = null) {	 
	    $user = $this->users->find($id);
	 
	    $this->theme->setTitle("View user with id");
	    $this->views->add('users/view', [
	        'user' => $user,
	    ]);
	} 


	/**
	 * Add new user.
	 *
	 * @param string $acronym of user to add.
	 *
	 * @return void
	 */
	public function addAction($acronym = null) {
	    if (!isset($acronym)) {
	        die("Missing acronym");
	    }
	 
	    $now = gmdate('Y-m-d H:i:s');
	 
	    $this->users->save([
	        'acronym' => $acronym,
	        'email' => $acronym . '@mail.se',
	        'name' => 'Mr/Mrs ' . $acronym,
	        'password' => password_hash($acronym, PASSWORD_DEFAULT),
	        'created' => $now,
	        'active' => $now,
	    ]);
	 
	    $url = $this->url->create('users/id/' . $this->users->id);
	    $this->response->redirect($url);
	}

	/**
	 * Delete user.
	 *
	 * @param integer $id of user to delete.
	 *
	 * @return void
	 */
	public function deleteAction($id = null) {
	    if (!isset($id)) {
	        die("Missing id");
	    }
	 
	    $res = $this->users->delete($id);
	 
	    $url = $this->url->create('users');
	    $this->response->redirect($url);
	}


	/**
	 * Delete (soft) user.
	 *
	 * @param integer $id of user to delete.
	 *
	 * @return void
	 */
	public function softDeleteAction($id = null)
	{
	    if (!isset($id)) {
	        die("Missing id");
	    }
	 
	    $now = gmdate('Y-m-d H:i:s');
	 
	    $user = $this->users->find($id);
	 
	    $user->deleted = $now;
	    $user->save();
	 
	    $url = $this->url->create('users/id/' . $id);
	    $this->response->redirect($url);
	}


	/**
	 * List all active and not deleted users.
	 *
	 * @return void
	 */
	public function activeAction()
	{
	    $all = $this->users->query()
	        ->where('active IS NOT NULL')
	        ->andWhere('deleted is NULL')
	        ->execute();
	 
	    $this->theme->setTitle("Users that are active");
	    $this->views->add('users/list-all', [
	        'users' => $all,
	        'title' => "Users that are active",
	    ]);
	}


}