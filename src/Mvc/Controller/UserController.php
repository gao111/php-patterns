<?php

namespace DesignPatterns\Mvc\Controller;

use DesignPatterns\Mvc\Controller;
use DesignPatterns\Mvc\Model\User;

class UserController extends Controller
{
    /**
     * @desc 查询用户
     * @param $id int
     */
    public function info(int $id)
    {
        $user = User::findOne(['id' => $id]);

        return $this->response->withJson($user->data());
    }

    /**
     * @desc 修改用户
     * @param $id int
     */
    public function edit(int $id)
    {
        $user = User::findOne(['id' => $id]);
        $data = $this->request->getBody();

        $user->nickname = $data['nickanem'] ?? null;
        $user->desc     = $data['desc'] ?? null;

        $result = $user->save();

        return $this->response->withJson(['result' => $result]);
    }

    /**
     * @desc 创建用户
     * @param $id int
     */
    public function create(int $id)
    {
        $user = new User();

        $data = $this->request->getBody();

        $user->nickname = $data['nickname'] ?? null;
        $user->desc     = $data['desc'] ?? null;
        $user->password = $data['password'] ?? null;

        $result = $user->save();

        return $this->response->withJson(['result' => $result]);
    }

    /**
     * @desc 删除用户
     * @param $id int
     */
    public function delete(int $id)
    {
        $result = User::findOne(['id' => $id])->delete();

        return $this->response->withJson(['result' => $result]);
    }
}