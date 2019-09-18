<?php

declare(strict_types = 1);

namespace CodelyTv\Apps\Backoffice\Frontend\Controller\Courses;

use CodelyTv\Mooc\CoursesCounter\Application\Find\CoursesCounterResponse;
use CodelyTv\Mooc\CoursesCounter\Application\Find\FindCoursesCounterQuery;
use CodelyTv\Shared\Infrastructure\Symfony\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class CoursesGetController extends Controller
{
    public function __invoke(Request $request): Response
    {
        /** @var CoursesCounterResponse $coursesCounterResponse */
        $coursesCounterResponse = $this->ask(new FindCoursesCounterQuery());

        return $this->render(
            'pages/courses.html.twig',
            [
                'title'           => 'Courses',
                'description'     => 'Courses CodelyTV - Backoffice',
                'courses_counter' => $coursesCounterResponse->total(),
            ]
        );
    }
}
