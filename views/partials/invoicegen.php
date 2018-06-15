<div class="container inv">
	<div class="row">
		<div class="col-12">
			<br/>
			Faktura:
			Nr. 
			<?php
			$invnumber = 1; 
			echo $invnumber.'/';
			echo date('d/m/Y'); //12.06.2018?>
			<div class="invdata">
				<p><b style="margin-right: 1%;">Miejsce wystawienia:</b> Białystok</p>
				<p><b style="margin-right: 1%;">Data wystawienia:</b> <?php echo date('d-m-Y'); // 2009-07-09?></p>
				<p><b style="margin-right: 1%;">Data realizacji:</b> <?php echo date('d-m-Y'); // 2009-07-09?></p>
			</div>
			<div class="invsell">
				Sprzedawca
				<hr>
				<p><b>AUTOCRASH Sp. z o.o.</b></p>
				<p>ul. Zwykła 2/1</p>
				<p>15-655 Białystok</p>
			</div>
			<div class="invbuy">
				Nabywca
				<hr>
				<?php foreach($clientsdata as $data) : ?>
				<p> <b><?=$data->FIRSTNAME.' '.$data->LASTNAME; ?></b></p>
				<p> <?='ul. '.$data->ADDRESS ?></p>
				<p> <?=$data->POSTALCODE.' '.$data->TOWN; ?></p>
				<?php endforeach; ?>
			</div>
			<table class="table table-sm invtable"  border="1">
		        <thead>
		          <tr>
		            <th scope="col">LP.</th>
		            <th scope="col">Nazwa Towaru / Usługi</th>
		            <th scope="col">Cena Netto</th>
		            <th scope="col">VAT</th>
		            <th scope="col">Wartość Netto</th>
		            <th scope="col">Wartość VAT</th>
		            <th scope="col">Wartość Brutto</th>
		        </tr>
		        </thead>
		        <tbody>
		        	<tr>
			            <th scope="row">1.</th>
			        	<td>Naprawa samochodu</td>
			        	<?php foreach($clientsdata as $data) : ?>
			        	<?php $VAT = round($data->BILL*0.23/1.23, 2); ?>
			        	<td><?=$data->BILL-$VAT; ?></td>
			        	<td>23%</td>
			        	<td><?=$data->BILL-$VAT;; ?></td>
			        	<td><?=$VAT; ?></td>
			        	<td><?=$data->BILL; ?></td>
			        	<?php endforeach; ?>
		            </tr>
		        </tbody>
	      	</table>
	      	<div class="invright">
	      		<table class="table table-sm invtable"  border="1">
		        <thead>
		          <tr>
		            <th scope="col">Razem</th>
		            <th scope="col">X</th>
		            <th scope="col"><?=$data->BILL-$VAT; ?></th>
		            <th scope="col"><?=$VAT ; ?></th>
		            <th scope="col"><?=$toPay = $data->BILL; ?></th>
		        </tr>
		        </thead>
		        <tbody>
		        	<tr>
			            <th scope="row">W tym</th>
			        	<td>23%</td>
			        	<td><?=$data->BILL-$VAT; ?></td>
			        	<td><?=$VAT; ?></td>
			        	<td><?=$data->BILL; ?></td>
		            </tr>
		        </tbody>
	      		</table>
	      	</div>
	      	<div class="invleft">
	      		<p>Razem:<span><?=$toPay ?> zł</span></p>
	      		<p>Do zapłaty:<span><?=$toPay ?> zł</span></p>
	      		<p>Forma płatności:<span>Gotówka</span></p>
	      		<p>Termin zapłaty:<span><?php echo date('d/m/Y'); //12.06.2018?></span></p>
	      		<p>Zapłacono:<span><?=$toPay ?> zł</span></p>
	      	</div>
	      	<div style="clear:both;"></div>
	      	<div class="invsignatureleft">
	      		<p>......................................................................................................<p>
	      		  Podpis osoby uprawnionej do wystawiania faktury
	      		
	      	</div>
	      	<div class="invsignatureright">
	      		<p>......................................................................................................<p>
	      		  Podpis osoby uprawnionej do odbioru faktury
	      	</div>
		</div>
	</div>
</div>