<?php

App::uses('AppController', 'Controller');


class SiteController extends AppController {


	public $uses = array('Medicament');

	public function index()
	{



	}

	public function addMedicaments()
	{

		$this->autoRender = false;

		$summary = $this->data['summary'];

		$summaryArray = explode("\n", $summary);

		foreach($summaryArray as $k => $qm)
		{

			$delimiter = strpos($qm , ')');

			if($delimiter !== false)
			{

				$quantity = trim(
								str_replace(
									'un.)',
									'', 
									str_replace(
										'(', 
										'', 
										substr(
											$qm, 
											0 , 
											$delimiter+1
										) 
									)
								)
							);



				$medicament = trim( 
								str_replace(
									'(Productos)', 
									'', 
									substr(
										$qm, 
										$delimiter+1 , 
										strlen($qm) - 1 
									)
								)
							);

				$exist = $this->Medicament->find('first',[

					'conditions' => [

						'Medicament.name' => $medicament

					]

				]);

				if($exist == false)
				{

					$newMedicament = [

						'name' => $medicament ,

						'quantity' => $quantity

					];
				}
				else
				{

					$newMedicament = [

						'id' => $exist['Medicament']['id'] ,

						'quantity' => $exist['Medicament']['quantity'] + $quantity


					];

				}

				$this->Medicament->create();

				$this->Medicament->save($newMedicament);

			}

		}

	}

	public function getMedicaments()
	{

		$this->autoRender = false;

		$medicaments = $this->Medicament->find(
			'list' , 
			[ 
				'fields' => [
					'name' , 
					'quantity'
				] 
			]

		);

		echo json_encode($medicaments);


	}

	public function limpiar()
	{

		$this->autoRender = false;

		$this->Medicament->query('TRUNCATE TABLE medicaments');

		$this->redirect(['controller' => 'Site' , 'action' => 'index']);

	}


}
