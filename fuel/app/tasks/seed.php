<?php 
#seeding data

namespace Fuel\Tasks;

class Seed 
{
	public static function run()
	{
		$projects = array("Example Project Title"=>"Example Project description that descripting nothing...",
		"Another title " => "Description that does nothing at all...",
		);
		foreach ($projects as $title => $description) {
			$p = \Model\Project::forge();
			$p->name = $title;
			$p->description = $description;
			$p->save();
			echo "Saving $title\n";
			echo "Seeding done!";
		}
	}

	# Reset all records in certain model, eg:
	#	php oil r seed:reset 'project';
	# note the model name using a singularized name!
	public static function reset($modelname='')
	{
		if ($modelname)
		{
			# Since models are singularized name,
			# the model name must be pluralized
			\DBUtil::truncate_table(\Inflector::pluralize($modelname));

			echo "All records on model $modelname successfully reset";
		}
		else {
			// I dont know how to list all models so I can directly
			// reset all tables...
			// So you must specify the model name instead like
			// example above... :(
			echo "Please specify a model name!";
		}
	}
}