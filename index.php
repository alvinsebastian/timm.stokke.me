<?php
include_once('./config.php');
include_once('./lib/utils.php');
require_once('./vendor/autoload.php');


$app = new \Slim\Slim(array(
	'view' => '\Slim\LayoutView',
	'layout' => 'layout.php',
	'templates.path' => './views',
	'debug' => true,
));

// Main route:
$app->get('/', function () use ($app, $config) {


	$app->render('main.php', array(
		'devEnviroment' => $app->get_env,
		'skills' => $app->fetch_skills,
		'repos' => $app->fetch_repos,
		'github_events' => $app->fetch_github_events,
		'designs' => $app->fetch_designs,
		'jobs' => $app->fetch_jobs,
		'timeline' => $app->fetch_timeline,
		'config' => $config,
	));
});


// Enviroment check:
$app->get_env = function() {

 	$enviroment = 'live';

	if ($_SERVER['HTTP_HOST'] === 'localhost') {
		$enviroment = 'dev';
	}

	return $enviroment;
};

// Jobs
$app->fetch_jobs = function() {
	$jobs = array(
		array(
			'timeframe' => '2011 - now',
			'company' => 'Colours AS',
			'title' => 'UI & UX Developer',
			'url' => 'http://colours.no',
			),
		array(
			'timeframe' => '2007 - 2011',
			'company' => 'Colours AS',
			'title' => 'Senior Developer',
			'url' => 'http://colours.no',
			),
		array(
			'timeframe' => '2001 - 2007',
			'company' => 'Aspekt AS',
			'title' => 'Partner, Lead Developer',
			'url' => 'http://web.archive.org/web/20071010142639/http://www.aspekt.no/',
			),

		);

	return $jobs;
};


// Skills
$app->fetch_skills = function() {
	$skills = array(
		'Frontend' => array(
			array(
				'title' => 'HTML5',
				'url' => 'http://en.wikipedia.org/wiki/HTML5',
				'votes' => 9,
				),
			array(
				'title' => 'CSS3',
				'url' => 'http://en.wikipedia.org/wiki/Cascading_Style_Sheets',
				),
			array(
				'title' => 'jQuery',
				'url' => 'http://jquery.com',
				),
			array(
				'title' => 'Javascript',
				'url' => 'http://en.wikipedia.org/wiki/Javascript',
				),
			array(
				'title' => 'Bootstrap 2 & 3',
				'url' => 'http://getbootstrap.com',
				),
			),
		'Backend' => array(
			array(
				'title' => 'PHP',
				'url' => 'http://php.net',
				),
			array(
				'title' => 'CakePHP',
				'url' => 'http://cakephp.org',
				),
			array(
				'title' => 'Slim Framework',
				'url' => 'http://www.slimframework.com/',
				),
			array(
				'title' => 'MySQL',
				'url' => 'http://mysql.com',
				),
			),
		'Design & Concept' => array(
			array(
				'title' => 'Photoshop',
				'url' => 'http://www.photoshop.com',
				),
			array(
				'title' => 'Pen & Paper',
				'url' => 'http://alistapart.com/article/paperprototyping',
				),
			array(
				'title' => 'Balsamiq mockups',
				'url' => 'http://balsamiq.com/',
				),
			array(
				'title' => 'FramerJS',
				'url' => 'http://framerjs.com',
				),
			array(
				'title' => 'SketchApp',
				'url' => 'http://www.bohemiancoding.com/sketch/',
				),
			),
		'Methodologies & Concepts' => array(
			array(
				'title' => 'Agile / Kanban',
				'url' => 'http://en.wikipedia.org/wiki/Agile_software_development',
				),
			array(
				'title' => 'Mobile first',
				'url' => null,
				),
			array(
				'title' => 'API design',
				'url' => null,
				),
			array(
				'title' => 'MVC',
				'url' => 'http://en.wikipedia.org/wiki/Model%E2%80%93view%E2%80%93controller',
				),
			array(
				'title' => 'DRY',
				'url' => "http://en.wikipedia.org/wiki/Don't_repeat_yourself",
				),
			array(
				'title' => "RESTful API's",
				'url' => 'http://en.wikipedia.org/wiki/Representational_state_transfer',
				),
			),
		'Tools' => array(

			array(
				'title' => 'Composer',
				'url' => 'http://getcomposer.org',
				),
			array(
				'title' => 'Grunt',
				'url' => 'http://gruntjs.com/',
				),
			array(
				'title' => 'Bower',
				'url' => 'http://bower.io',
				),
			array(
				'title' => 'Git',
				'url' => 'http://github.com',
				),
			array(
				'title' => 'Sublime Text',
				'url' => 'http://www.sublimetext.com/',
				),
			),
		'Services' => array(
			array(
				'title' => 'Basecamp',
				'url' => 'http://basecamp.com',
				),
			array(
				'title' => 'Hipchat',
				'url' => 'http://hipchat.com',
				),
			array(
				'title' => 'Leankit',
				'url' => 'http://leankit.com',
				),
			array(
				'title' => 'Sprint.ly',
				'url' => 'http://sprint.ly',
				),
			array(
				'title' => 'Trello',
				'url' => 'http://trello.com',
				),
			array(
				'title' => 'Google Apps',
				'url' => 'http://www.google.com/enterprise/apps/business/',
				),
			array(
				'title' => 'Github',
				'url' => 'http://github.com',
				),
			),

		);

	return $skills;
};

// Designs/portfolio
$app->fetch_designs = function() {
	$designs = array(
		// ColoursCMS
		array(
			'media' => array(
				'img/projects/ccms1.jpg',
				'img/projects/ccms2.jpg',
				'img/projects/ccms3.jpg',
				),
			'client' => 'Colours',
			'project_name' => 'ColoursCMS',
			'url' => 'http://www.colourscms.no',
			'tease' => 'ColoursCMS is a beautifully simple and powerful content management system',
			'description' => "
				<p>
					ColoursCMS is a beautifully simple and powerful content management system, build on CakePHP.
				</p>
				<p>
					I worked on concepts, spec, UI & UX, frontend and backend development
					in the 2010–2013 timeframe.
				</p>",
			),
		// SPREK
		array(
			'media' => array(
				'img/projects/btsprek1.jpg',
				'img/projects/btsprek2.jpg',
				),
			'client' => 'Bergens Tidende',
			'project_name' => 'Sprek',
			'skills' => array('UI', 'UX', 'Frontend', 'Backend', 'Concept', 'Business'),
			'url' => 'http://tur.bt.no',
			'tease' => 'A service for finding and taking hikes.',
			'description' => '
				<p>
					BT Sprek is a service for finding and taking hikes in and
					around Bergen and Tromsø, Norway. Available
					<a target="_blank" href="http://tur.bt.no">on the web</a>,
					<a target="_blank" href="https://itunes.apple.com/us/app/bt-sprek/id439293777?mt=8">IPhone</a> and
					<a target="_blank" href="https://play.google.com/store/apps/details?id=no.appy.btsprek&hl=en">Android</a>
				</p>

				<p>
					I worked on spec, UI & UX, frontend and backend development
					in the 2010–2013 timeframe. I also acted as project lead for
					over one year.
				</p>',
			),
		// GCRIEBER
		array(
			'media' => array(
				'img/projects/gcrieber1.jpg',
				'img/projects/gcrieber3.jpg',
				'img/projects/gcrieber2.jpg',
				),
			'client' => 'GCRieber',
			'project_name' => 'Responsive redesign',
			'url' => 'http://www.gcrieber-eiendom.no',
			'tease' => 'Landowner and properties holder in Bergen, Norway.',
			'description' => '
				<p>
					GC Rieber Eiendom developes and operates several properties in Bergen, Norway.
					Designed in collaberation with <a href="https://twitter.com/IvarBorthen81" target="_blank"> @IvarBorthen81</a>.
				</p>',
			),
		// RGROUP
		array(
			'media' => array(
				'img/projects/rgroup.jpg',
				),
			'client' => 'Randaberg Group',
			'project_name' => 'Responsive redesign',
			'url' => 'http://www.rgroup.no',
			'description' => "
				<p>
					Randaberg Group offers a wide array of products and services in steel production and protection for subsea and storage
				</p>",
			),
		);

	return $designs;
};

// Github repos:
$app->fetch_repos = function () {

	// Set up cache:
	$key = FileSystemCache::generateCacheKey('github');
	$repos = FileSystemCache::retrieve($key);

	// If no cache found:
	if ($repos === false) {

		// Fetch from API
		$headers = array('Accept' => 'application/json');
		$options = array('User-Agent' => 't1mmen');
		$response = Requests::get('https://api.github.com/users/t1mmen/repos', $headers, $options);

   		$repos = json_decode($response->body, true);

		// Store cache:
		FileSystemCache::store($key, $repos, 3600);
	}

	// Order Github data:

	$orderedRepos = array();

	foreach ($repos as $repo) {

		if ($repo['fork'] == 1) {
			continue; // Skip forks
		}

		// Do we have homepage?
		$homepage = $repo['html_url'];
		if ($repo['homepage'] != null) {
			$homepage = $repo['homepage'];
		}

		$timestamp = strtotime($repo['updated_at']);

		$orderedRepos[$timestamp] = array(
			'name' => $repo['name'],
			'html_url' => $repo['html_url'],
			'homepage' => $homepage,
			'description' => $repo['description'],
			'watchers_count' => $repo['watchers_count'],
			'stargazers_count' => $repo['stargazers_count'],
			'forks' => $repo['forks'],
			'open_issues_count' => $repo['open_issues_count'],
			'language' => $repo['language'],
			'updated_timestamp' => $timestamp,
		);
	}


	// Order by date modified:
	krsort($orderedRepos);

	// Only show most recent ones...
	$orderedRepos = array_slice($orderedRepos, 0, 3);

	return $orderedRepos;
};


// Github events:
$app->fetch_github_events = function () {

	// Set up cache:
	$key = FileSystemCache::generateCacheKey('github_events');
	$events = FileSystemCache::retrieve($key);

	// If no cache found:
	if ($events === false) {

		// Fetch from API
		$headers = array('Accept' => 'application/json');
		$options = array('User-Agent' => 't1mmen');
		$response = Requests::get('https://api.github.com/users/t1mmen/events', $headers, $options);

   		$events = json_decode($response->body, true);

		// Store cache:
		FileSystemCache::store($key, $events, 3600);
	}

	// Order Github events:
	$orderedEvents = array();
	$eventsToDisplay = array('PullRequestEvent');

	foreach ($events as $event) {

		// Show only the events we want:
		if (!in_array($event['type'], $eventsToDisplay)) {
			continue;
		}

		$timestamp = strtotime($event['created_at']);

		$repoDetails = explode('/', $event['repo']['name']);

		$orderedEvents[$timestamp] = array(
			'name' => end($repoDetails),
			'homepage' => $event['payload']['pull_request']['base']['repo']['html_url'],
			'description' => $event['payload']['pull_request']['base']['repo']['description'],
			'language' => $event['payload']['pull_request']['base']['repo']['language'],
			'account' => reset($repoDetails),
			'stargazers_count' => $event['payload']['pull_request']['base']['repo']['stargazers_count'],
			'watchers_count' => $event['payload']['pull_request']['base']['repo']['watchers_count'],
			'forks' => $event['payload']['pull_request']['base']['repo']['forks'],
			'homepage' => 'http://github.com/'.$event['repo']['name'].'/pulls/'.$event['payload']['pull_request']['number'],
			'updated_timestamp' => $timestamp,
		);

	}

	// Order by date modified:
	krsort($orderedEvents);

	// Only show most recent ones...
	$orderedEvents = array_slice($orderedEvents, 0, 3);

	return $orderedEvents;
};


// Timeline
$app->fetch_timeline = function () {
	$timeline = array(
		array(
			'title' => 'Became a huge nerd',
			'year' => 1995,
			'description' => "Fell in love with computers. At first, games caught my attention. By '97, I was running my first gaming website.",
			'type' => 'personal',
			),
		array(
			'title' => 'Graduated from IT-Akademiet',
			'year' => 2002,
			'type' => 'jobchange',
			),
		array(
			'title' => 'Joined my first startup',
			'year' => 2002,
			'description' => 'Hired by my former teacher, bootstrapped.',
			'type' => 'jobchange',
			),
		array(
			'title' => 'Shipped 2net Publish',
			'year' => 2004,
			'description' => "My first major SaaS launch, this content management system is still in use by several major websites today.",
			),
		array(
			'title' => 'Played the World Series of Poker',
			'year' => 2006,
			'description' => "Busting out with aces vs jacks was rough, but what an experience! These days, I don't play much outside of a homegame or two a year.",
			'type' => 'personal',
			),
		array(
			'title' => 'Aquihired',
			'year' => 2007,
			'description' => 'Colours bought Aspekt',
			'type' => 'jobchange',
			),
		array(
			'title' => 'Met the most beautiful girl in the world',
			'year' => 2008,
			'description' => 'To this day, she continues to impress me with her awesomeness! <i class="fa fa-heart"></i>',
			'type' => 'personal',
			),
		array(
			'title' => 'Designed apartment blueprints',
			'year' => 2009,
			'description' => 'Designing living spaces proved a fun challenge.',
			),
		array(
			'title' => 'Released my first jQuery plugin',
			'url' => 'https://github.com/t1mmen/jquery-handleform',
			'year' => 2012,
			),
		array(
			'title' => 'Got a dog!',
			'year' => 2012,
			'description' => 'The most glorious boston terrier became ours.',
			'type' => 'personal',
			),
		array(
			'title' => 'Moving to Canada',
			'year' => 2014,
			),
		);
	return $timeline;
};

$app->run();
?>

