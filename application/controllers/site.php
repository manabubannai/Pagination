<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Site extends CI_Controller {
	function index(){
		$this->load->library("pagination");
		$this->load->library("table");

		$this->table->set_heading("番号", "タイトル", "内容");


		// ページネーション処理が含まれるコントローラクラス/ メソッドへの完全な URL
		// http://localhost/pagination/index.php/site/index
		// /http://localhost/pagination/index.php/コントローラー名/ファンクション名
		$config["base_url"] = "http://localhost/pagination/index.php/site/index";

		// データベースから合計の行数を取得する
		$config["total_rows"] = $this->db->get("data")->num_rows();

		// 1ページにいくつの記事を表示するか設定する
		$config["per_page"] = 3;

		// 選択中のページ番号の前後に表示したい "数字" リンクの数。
		// たとえば、3を指定すると、 次の写真ように、現在のページのページ番号の両脇に3つの番号リンクが置かれます。
		$config["num_links"] = 3;

		$config["full_tag_open"] = "<div id='pagenation'>";
		$config["full_tag_close"] = "</div>";

		$this->pagination->initialize($config);

		// get("①", "②", "③")
		// ①テーブル名
		// ②引っ張るデータの数
		// ③オフセット（※あとで解説します）
		$data["records"] = $this->db->get("data", $config["per_page"], $this->uri->segment(3));

		$this->load->view("site_view", $data);
	}
}