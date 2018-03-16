<?php
class Controller_Category extends Controller_Admin
{
	public $template = "_layout/inspinia";

	public function action_index()
	{
		$data['categories'] = Model_Category::find('all');
		$this->template->title = "Categories";
		$this->template->content = View::forge('category/index', $data);

	}

	public function action_view($id = null)
	{
		is_null($id) and Response::redirect('category');

		if ( ! $data['category'] = Model_Category::find($id))
		{
			Session::set_flash('error', 'Could not find category #'.$id);
			Response::redirect('category');
		}

		$this->template->title = "Category";
		$this->template->content = View::forge('category/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Category::validate('create');

			if ($val->run())
			{
				$category = Model_Category::forge(array(
					'company_id' => Input::post('company_id'),
					'title' => Input::post('title'),
					'type' => Input::post('type'),
					'color' => Input::post('color'),
					'enabled' => Input::post('enabled'),
				));

				if ($category and $category->save())
				{
					Session::set_flash('success', 'Added category #'.$category->id.'.');

					Response::redirect('category');
				}

				else
				{
					Session::set_flash('error', 'Could not save category.');
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Categories";
		$this->template->content = View::forge('category/create');

	}

	public function action_edit($id = null)
	{
		is_null($id) and Response::redirect('category');

		if ( ! $category = Model_Category::find($id))
		{
			Session::set_flash('error', 'Could not find category #'.$id);
			Response::redirect('category');
		}

		$val = Model_Category::validate('edit');

		if ($val->run())
		{
			$category->company_id = Input::post('company_id');
			$category->title = Input::post('title');
			$category->type = Input::post('type');
			$category->color = Input::post('color');
			$category->enabled = Input::post('enabled');

			if ($category->save())
			{
				Session::set_flash('success', 'Updated category #' . $id);

				Response::redirect('category');
			}

			else
			{
				Session::set_flash('error', 'Could not update category #' . $id);
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$category->company_id = $val->validated('company_id');
				$category->title = $val->validated('title');
				$category->type = $val->validated('type');
				$category->color = $val->validated('color');
				$category->enabled = $val->validated('enabled');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('category', $category, false);
		}

		$this->template->title = "Categories";
		$this->template->content = View::forge('category/edit');

	}

	public function action_delete($id = null)
	{
		is_null($id) and Response::redirect('category');

		if ($category = Model_Category::find($id))
		{
			$category->delete();

			Session::set_flash('success', 'Deleted category #'.$id);
		}

		else
		{
			Session::set_flash('error', 'Could not delete category #'.$id);
		}

		Response::redirect('category');

	}

}
