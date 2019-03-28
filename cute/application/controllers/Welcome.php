<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header("Access-Control-Allow-Origin: * ");
class Welcome extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *        http://example.com/index.php/welcome
     *    - or -
     *        http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
	public function index()
	{
		$this->load->view('index');
//        $loginedUser = $this -> session -> userdata('loginedUser');
	}
    public function reg()
    {
        $this->load->view('reg');
    }
    public function first()
    {
        $this->load->view('first');
    }
    public function login()
    {
        $this->load->view('login');
    }
    public function check_name(){
         header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
        header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, authKey, sessionId');
        $uname=$this->input->get('uname');
        $this->load->model('user_model');
        $rs=$this->user_model->check_name($uname);
        if($rs){
            echo "success";
        }else{
            echo "error";
        }

    }
    public function do_reg(){
        $username = $this -> input -> post('username');
        $pwd= $this -> input -> post('pwd');
        $img= $this -> input -> post('img');
        //验证

        $this -> load -> model('user_model');
        $rows = $this -> user_model -> save($username, $pwd,$img);
       if($rows > 0){
           $this -> load -> view('first');

        }else{
           $this -> load -> view('reg');
        }
    }
    public function check_login(){
        //1. 接收数据
        $f_name = $this -> input -> post('f_name');
        $f_pwd = $this -> input -> post('f_pwd');

        //2. 验证
        //3. 数据库操作
        $this -> load -> model('user_model');//加载model文件
        $result = $this -> user_model -> get_by_name_pwd($f_name, $f_pwd);
        if($result){//查到结果
//            $this -> session -> set_userdata('loginedUser', $result);
            echo '<body>
<div style="margin-top: 20%;margin-left: 40% ; font-size: 20px">
<h1>可爱多欢迎您光临</h1> <a href="../welcome/first">进入主页</a>
</div>

</body>

';
//            redirect('welcome');
        }else{//未查到结果
            echo '您输入的结果有误！请重新输入！';
            $this -> load -> view('login');
        }
    }
}