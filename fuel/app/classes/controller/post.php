<?php
class Controller_Post extends Controller_Admin
{
	public $template = "_layout/inspinia_dash2";

	public function action_index()
	{
		$data['posts'] = Model_Post::find('all');
		$this->template->title = "Posts";
		$this->template->content = View::forge('post/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('post');

		if ( ! $data['post'] = Model_Post::find($id))
		{
			Session::set_flash('error', 'Could not find post #'.$id);
			Response::redirect('post');
		}

		$this->template->title = "Post";
		$this->template->content = View::forge('post/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Post::validate('create');

			if ($val->run())
			{
				$post = Model_Post::forge(array(
					'created_by' => Input::post('created_by'),
					'description' => Input::post('description'),
					'post_id' => Input::post('post_id'),
					'share_with' => Input::post('share_with'),
					'files' => Input::post('files'),
				));

				if ($post and $post->save())
				{
					Session::set_flash('success', 'Added post #'.$post->id.'.');

					Response::redirect('post');
				}

				else
				{
					Session::set_flash('error', 'Could not save post.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Posts";
		$this->template->content = View::forge('post/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('post');

		if ( ! $post = Model_Post::find($id))
		{
			Session::set_flash('error', 'Could not find post #'.$id);
			Response::redirect('post');
		}

		$val = Model_Post::validate('edit');

		if ($val->run())
		{
			$post->created_by = Input::post('created_by');
			$post->description = Input::post('description');
			$post->post_id = Input::post('post_id');
			$post->share_with = Input::post('share_with');
			$post->files = Input::post('files');

			if ($post->save())
			{
				Session::set_flash('success', 'Updated post #' . $id);

				Response::redirect('post');
			}

			else
			{
				Session::set_flash('error', 'Could not update post #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$post->created_by = $val->validated('created_by');
				$post->description = $val->validated('description');
				$post->post_id = $val->validated('post_id');
				$post->share_with = $val->validated('share_with');
				$post->files = $val->validated('files');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('post', $post, false);
		}

		$this->template->title = "Posts";
		$this->template->content = View::forge('post/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('post');

		if ($post = Model_Post::find($id))
		{
			$post->delete();

			Session::set_flash('success', 'Deleted post #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete post #'.$id);
		}

		Response::redirect('post');

	}

}
