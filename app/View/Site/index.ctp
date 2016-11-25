<?php ?>

<html>
	<head>

		<title></title>

	</head>

	<body ng-app="app" ng-controller="HomeController">	

		<div style="width: 50%; margin-left: 25%; margin-top: 50px;">

		<?php 

			echo $this->Form->create(
				'Medicament', 
				[
					'name' => 'summaryForm' , 

					'ng-submit' => 'checkForm($event , summaryForm.$valid)'

				]

			);

			echo $this->Form->textarea(
				'summary',
				[

					'ng-model' => 'summary',
					'style' => 'width: 100%; height: 300px; margin-bottom: 50px;'

				]
			);

			?>

			<div style="width:50%;">
			
				<input type="submit" value="Enviar" style="float: left; ">

			</div>

			<a href="site/limpiar" style="float: right; width: 50%; text-align: right; ">Limpiar</a>

			<?php



			echo $this->Form->end();

		?>

		<div style="clear:both"></div>

		<br>

		

		<table ng-init="getMedicaments()" >

			<tr>
				<th>Medicamento</th>
				<th>Cantidad</th>
			</tr>

			<tr ng-repeat="(medicament , quantity) in medicaments">
				<td> {{ medicament }}</td>
				<td> {{ quantity }}</td>
			</tr>

		</table>

	</div>

	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.10/angular.min.js" ></script>

	<script type="text/javascript" src="js/app.js" ></script>
	<script type="text/javascript" src="js/app.controllers.js" ></script>
	<script type="text/javascript" src="js/app.services.js" ></script>

	</body>

</html>