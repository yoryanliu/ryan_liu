<?php
/**
 * Fuel is a fast, lightweight, community driven PHP5 framework.
 *
 * @package    Fuel
 * @version    1.8
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2016 Fuel Development Team
 * @link       http://fuelphp.com
 */

/**
 * The Welcome Controller.
 *
 * A basic controller example.  Has examples of how to set the
 * response body and status.
 *
 * @package  app
 * @extends  Controller
 */
class Controller_Run extends Controller
{
//	public function action_index()
//	{
//		return Response::forge(View::forge('run/index'));
//	}
	public function action_list()
	{
		$view = View::forge('run/list');

		$result = DB::query('SELECT * FROM `game`')->execute();
		$list = '';
		$result_array = $result->as_array();
		foreach ( $result_array as $key => $value ){
			$list .='<tr>
			<td>' . $value['id'] . '</td>
			<td>' . $value['name'] . '</td>
			<td>' . $value['detal'] . '</td>
			<td>' . date('Ymd H:i', $value['dateStart']) . ' ~ '. date('Ymd H:i', $value['dateEnd']) .'</td>
			<td>' . date('Ymd H:i', $value['registrationStarts']) . ' ~ '. date('Ymd H:i', $value['registrationEnds']) .'</td>
			<td><a href="/page/?id='.$value['id'].'">詳細資訊</a></td>
			</tr>';
		}
		$view->list = $list;
		$view->auto_filter(false);
		return $view;
	}
	public function action_adminGameAdd()
	{
		if ( Input::method()=='POST' ){
			// 檢查資料
			$name = $_POST['name'];
			$detal = $_POST['detal'];
			$dateStart = strtotime($_POST['dateStart']);
			$dateEnd = strtotime($_POST['dateEnd']);
			$registrationStarts = strtotime($_POST['registrationStarts']);
			$registrationEnds = strtotime($_POST['registrationEnds']);

			// 寫入資料庫
			$sql = 'INSERT INTO `game` (`name`,`detal`,`dateStart`,`dateEnd`,`registrationStarts`,`registrationEnds`) VALUES
			("'.$name.'","'.$detal.'","'.$dateStart.'","'.$dateEnd.'","'.$registrationStarts.'","'.$registrationEnds.'")';
			$result = DB::query($sql)->execute();

			// 轉址
			header('location: /admin');exit;
		}
		$view = View::forge('run/adminGameAdd');
		return $view;
	}
	public function action_adminIndex()
	{
		$view = View::forge('run/adminIndex');
		$sql = 'SELECT * FROM `game`';
		$result = DB::query($sql)->execute();

		$list = '';
		$result_array = $result->as_array();
		$i=0;
		foreach ( $result_array as $key => $value ){
			$style = ( $i%2==0 ) ? 'odd' : 'even';
			$sql = 'SELECT COUNT(*) AS `num` FROM `game_member_relation` WHERE `game_id`='.$value['id'];
			$result = DB::query($sql)->execute();
			$result = $result->as_array();
			$result = $result[0];

			$list .='<tr class="'.$style.'">
			<td>' . $value['id'] . '</td>
			<td>' . $value['name'] . '</td>
			<td>' . $value['detal'] . '</td>
			<td>' . date('Ymd H:i', $value['dateStart']) . ' ~ '. date('Ymd H:i', $value['dateEnd']) .'</td>
			<td>' . date('Ymd H:i', $value['registrationStarts']) . ' ~ '. date('Ymd H:i', $value['registrationEnds']) .'</td>
			<td><a href="/admin/join_list/?id='.$value['id'].'">' . $result['num'] . '</a></td>
			<td><a href="/page/?id='.$value['id'].'">前往</a></td>
			</tr>';
		}
		$view->list = $list;
		$view->auto_filter(false);
		return $view;
	}
	public function action_adminJoinList()
	{
		$game_id = $_GET['id'];

		$view = View::forge('run/adminJoinList');
		$list ='';
		$sql = 'SELECT `name`, `detal`, `dateStart`, `dateEnd`, `registrationStarts`, `registrationEnds`
 		 FROM `game` WHERE `id`='.$game_id.' LIMIT 0, 1';
		$result = DB::query($sql)->execute();
		$result_array = $result->as_array();
		$result_array = $result_array[0];
		$view->info_name = $result_array['name'];
		$view->info_dateStartToEnd = date('Ymd H:i', $result_array['dateStart']) . ' ~ ' . date('Ymd H:i', $result_array['dateEnd']);
		$view->info_registrationStartEnds = date('Ymd H:i', $result_array['registrationStarts']) . ' ~ '. date('Ymd H:i', $result_array['registrationEnds']);

		$sql = 'SELECT `t2`.`name`, `t2`.`phone`, `t2`.`idNo`, `t2`.`email`
		 FROM `game_member_relation` AS `t1` LEFT JOIN `member` AS `t2` ON `t2`.id=`t1`.`member_id`
		 WHERE `t1`.`game_id`='.$game_id;
		$result = DB::query($sql)->execute();

		$list = '';
		$result_array = $result->as_array();
		foreach ( $result_array as $key => $value ){
			$list .='<tr>
			<td>' . $value['name'] . '</td>
			<td>' . $value['phone'] . '</td>
			<td>' . $value['idNo'] . '</td>
			<td>' . $value['email'] . '</td>
			</tr>';
		}
		$view->list = $list;
		$view->auto_filter(false);
		return $view;
	}
	public function action_page()
	{
		$view = View::forge('run/page');
		$id = $_GET['id'];
		$result = DB::query('SELECT * FROM `game` WHERE id='.$id.' LIMIT 0,1')->execute();
		$result_array = $result->as_array();
		$result_array = $result_array[0];
		$view->info_name = $result_array['name'];
		$view->info_dateStartToEnd = date('Ymd H:i', $result_array['dateStart']) . ' ~ ' . date('Ymd H:i', $result_array['dateEnd']);
		$view->info_registrationStartEnds = date('Ymd H:i', $result_array['registrationStarts']) . ' ~ '. date('Ymd H:i', $result_array['registrationEnds']);
		$view->info_detal = $result_array['detal'];
		$view->id = $result_array['id'];
		$view->auto_filter(false);
		return $view;
	}
	public function action_signUp()
	{
		if ( Input::method()=='POST' ){
			// 檢查資料
			$game_id = $_POST['id'];
			$name = $_POST['name'];
			$phone = $_POST['phone'];
			$idNo = $_POST['idNo'];
			$email = $_POST['email'];

			// 寫入資料庫
			$sql = 'INSERT INTO `member` (`name`,`phone`,`idNo`,`email`) VALUES
			("'.$name.'","'.$phone.'","'.$idNo.'","'.$email.'")';
			DB::query($sql)->execute();
			$result = DB::query('SELECT LAST_INSERT_ID() AS last_id')->execute();
			$result_array = $result->as_array();
			$result_array = $result_array[0];
			$sql = 'INSERT INTO `game_member_relation` (`game_id`,`member_id`) VALUES
			("'.$game_id.'","'.$result_array['last_id'].'")';
			DB::query($sql)->execute();
			// 轉址
			header('location: /');exit;
		}
		$view = View::forge('run/signUp');
		$id = isset($_GET['id']) ? $_GET['id'] : null;
		if ( $id===null ){
			header('location: /');exit;
		}

		$result = DB::query('SELECT * FROM `game` WHERE id='.$id.' LIMIT 0,1')->execute();
		$result_array = $result->as_array();
		$result_array = $result_array[0];
		$view->info_name = $result_array['name'];
		$view->info_dateStartToEnd = date('Ymd H:i', $result_array['dateStart']) . ' ~ ' . date('Ymd H:i', $result_array['dateEnd']);
		$view->info_registrationStartEnds = date('Ymd H:i', $result_array['registrationStarts']) . ' ~ '. date('Ymd H:i', $result_array['registrationEnds']);
		$view->id = $id;
		$view->auto_filter(false);
		return $view;
	}
	public function action_404()
	{
		return Response::forge(Presenter::forge('run/404'), 404);
	}
}
