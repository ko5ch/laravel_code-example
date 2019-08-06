<?php

namespace Modules\Users\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Controllers\Traits\Responseable;
use Modules\Main\Http\Requests\TaskStatusRequest;
use Modules\Users\Http\Requests\UserTaskRequest;
use Modules\Main\Repositories\CategoryRepository;
use Modules\Users\Repositories\UserRepository;
use Modules\Main\Repositories\TaskRepository;
use Modules\Main\Entities\Task;
use Modules\Main\Http\Resources\TaskResource;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class UserTaskController extends Controller
{
    use AuthorizesRequests, Responseable;

    protected $categoryRepository;
    protected $userRepository;
    protected $taskRepository;

    public function __construct(UserRepository $userRepository, TaskRepository $taskRepository,
                                CategoryRepository $categoryRepository)
    {
        $this->categoryRepository   = $categoryRepository;
        $this->userRepository       = $userRepository;
        $this->taskRepository       = $taskRepository;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     * @throws \Throwable
     */
    public function index(Request $request)
    {
        $user = auth()->user();
        $tasks = TaskResource::collection($this->taskRepository->tasks($user, $request->get('category')));

        if (request()->ajax()) {
            return view('todo.tasks.content.index', compact('tasks'))->render();
        }
        return view('todo.tasks.index', compact('user', 'tasks'));
    }

    /**
     * @param Task $task
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Task $task)
    {
        $categories = $this->categoryRepository->getAll()->pluck('name', 'id')->toArray();
        return view('todo.tasks.content.create', compact('task', 'categories'));
    }

    /**
     * @param UserTaskRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserTaskRequest $request)
    {
        $this->taskRepository->store(auth()->user(), $request->only('title', 'description', 'category_id'));
        return $this->backSuccess();
    }

    /**
     * @param Task $uid
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(Task $uid)
    {
        $this->authorize('manage', $uid);

        $categories = $this->categoryRepository->getAll()->pluck('name', 'id')->toArray();
        return view('todo.tasks.content.edit', ['task' => $uid, 'categories' => $categories]);
    }

    /**
     * @param Task $uid
     * @param UserTaskRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Task $uid, UserTaskRequest $request)
    {
        $this->authorize('manage', $uid);

        $this->taskRepository->update($uid, $request->only('title', 'description', 'category_id'));
        return $this->backSuccess();
    }

    /**
     * @param Task $uid
     * @param TaskStatusRequest $request
     * @return array|\Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @throws \Throwable
     */
    public function updateStatus(Task $uid, TaskStatusRequest $request)
    {
        $this->authorize('manage', $uid);

        $this->taskRepository->updateStatus($uid, $request->get('status'));
        if (request()->ajax()) {
            $returnHTML = view('todo.tasks.content.partials._status', ['task' => $uid])->render();
            return response()->json(['success' => true, 'html' => $returnHTML]);
        }
        return $this->success();
    }

    /**
     * @param Task $uid
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function destroy(Task $uid)
    {
        $this->authorize('manage', $uid);

        $this->taskRepository->delete($uid);
        return $this->backSuccess();
    }
}
