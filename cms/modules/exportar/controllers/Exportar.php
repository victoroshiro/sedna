<?php

class Exportar extends CI_Controller {

	public $data;

	public function __construct() {

		parent::__construct();

		$this->load->model('usuarios/usuarios_m');
		$this->load->model('exportar_m');
	}

	public function index($offset = NULL) {
		if ($this->usuarios_m->logado()) {
			
			if($this->session->userdata('tipo') == 2){
			    show_404();
			}

			$this->load->view('exportar');

		} else {
			$this->load->view('admin/login/index', $this->data);
		}
	}

	public function gerar_excel()
	{
		if($this->session->userdata('tipo') == 2){
		    show_404();
		}

		$post = $this->input->post();

		if($post){

			$resultado = false;

			$post['origem'] = (isset($post['origem'])) ? $post['origem'] : 'Todos';

			$resultado = $this->exportar_m->gerar_excel(array('origem' => $post['origem']));

			if($resultado){
				$this->generate_file($resultado, $post['origem']);
			}else{
				$this->session->set_flashdata('errors', 'Não há resultados para esta pesquisa.');
		        redirect('exportar', 'location');
			}
		}else{
			$this->session->set_flashdata('errors', 'Por favor, clique em "Gerar Excel" para gerar o arquivo.');
	        redirect('exportar', 'location');
		}
	}

	public function generate_file($data, $nome_planilha)
	{
		if($this->session->userdata('tipo') == 2){
		    show_404();
		}
		
		//load our new PHPExcel library
		$this->load->library('excel');
		//activate worksheet number 1
		$this->excel->setActiveSheetIndex(0);
		//name the worksheet
		$this->excel->getActiveSheet()->setTitle(ucfirst($nome_planilha));

		if($nome_planilha == 'Contato'){
			//set cell A1 content with some text
			$this->excel->getActiveSheet()->setCellValue('A1', 'Nome');
			$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(12);
			$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);

			$this->excel->getActiveSheet()->setCellValue('B1', 'E-mail');
			$this->excel->getActiveSheet()->getStyle('B1')->getFont()->setSize(12);
			$this->excel->getActiveSheet()->getStyle('B1')->getFont()->setBold(true);

			$this->excel->getActiveSheet()->setCellValue('C1', 'Telefone');
			$this->excel->getActiveSheet()->getStyle('C1')->getFont()->setSize(12);
			$this->excel->getActiveSheet()->getStyle('C1')->getFont()->setBold(true);

			$this->excel->getActiveSheet()->setCellValue('D1', 'Assunto');
			$this->excel->getActiveSheet()->getStyle('D1')->getFont()->setSize(12);
			$this->excel->getActiveSheet()->getStyle('D1')->getFont()->setBold(true);
			
			$this->excel->getActiveSheet()->setCellValue('E1', 'Mensagem');
			$this->excel->getActiveSheet()->getStyle('E1')->getFont()->setSize(12);
			$this->excel->getActiveSheet()->getStyle('E1')->getFont()->setBold(true);

			$this->excel->getActiveSheet()->setCellValue('F1', 'Data:');
			$this->excel->getActiveSheet()->getStyle('F1')->getFont()->setSize(12);
			$this->excel->getActiveSheet()->getStyle('F1')->getFont()->setBold(true);

			$this->excel->getActiveSheet()->setCellValue('G1', 'Quer receber newsletter?');
			$this->excel->getActiveSheet()->getStyle('G1')->getFont()->setSize(12);
			$this->excel->getActiveSheet()->getStyle('G1')->getFont()->setBold(true);
		}else{
			$this->excel->getActiveSheet()->setCellValue('A1', 'E-mail');
			$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(12);
			$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
		}	


		//merge cell A1 until D1
		// $this->excel->getActiveSheet()->mergeCells('A1:D1');
		
		//set aligment to center for that merged cell (A1 to D1)
		// $this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

		$row_count = 2;

		foreach ($data as $item) {

			if($nome_planilha == 'Contato'){
				$this->excel->getActiveSheet()->setCellValue('A'.$row_count, $item->nome);
				$this->excel->getActiveSheet()->setCellValue('B'.$row_count, $item->email);
				$this->excel->getActiveSheet()->setCellValue('C'.$row_count, $item->telefone);
				$this->excel->getActiveSheet()->setCellValue('D'.$row_count, $item->assunto);
				$this->excel->getActiveSheet()->setCellValue('E'.$row_count, (isset($item->mensagem)) ? $item->mensagem : '');
				$this->excel->getActiveSheet()->setCellValue('F'.$row_count, $item->dateFormated);
				$this->excel->getActiveSheet()->setCellValue('G'.$row_count, ($item->opt_in == 0) ? 'Não' : 'Sim');
			}else{
				$this->excel->getActiveSheet()->setCellValue('A'.$row_count, $item->email);
			}

			$row_count++;
		}

		foreach(range('A','G') as $columnID) {
		    $this->excel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
		}

		$hash = md5(date('U') . uniqid(rand(), true) . 'just_some_random_name').'_'.$nome_planilha;
        $newName = $hash;

		$filename = $newName.'.xlsx'; //save our workbook as this file name
		
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache
		             
		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');  
		//force user to download the Excel file without writing it to server's HD
		$objWriter->save('php://output');
	}
}
?>