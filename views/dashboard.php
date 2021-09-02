<?php require 'views/parts/header.php'; ?>

<style>
    .invisible { display: none; }
</style>
<section>	
	<div class="Btn-add">
    	<span>
      		<button <?=$create?> type="button" name="addInvoice"><a href="?page=admin&action=add_invoice">Add invoice</a></button>
      		<button <?=$create?> type="button" name="addCompany"><a href="?page=admin&action=add_company">Add company</a></button>
      		<button <?=$create?> type="button" name="addPerson"><a href="?page=admin&action=add_person">Add person</a></button>
		</span>
	</div>
	<div class="cl-pr">
		<span>
		  	<button type="button" name="client"><a class="nav-link" href="?page=client">Client</a></button>
          	<button type="button" name="provider"><a class="nav-link" href="?page=provider">Provider</a></button>
        </span>
	</div>
				<h2><a href="?page=company">Companies</a></h2>
				<table >
					<caption>List of last five companies</caption>
					<tr>
						<th>Name</th>
						<th>Country</th>
                        <th>Vat</th>
						<th>Type</th>
                        <?php if ($_SESSION['role'] == 'admin') { ?>
                           <th colspan="2" ></th>
                        <?php } ?>
					</tr>
                  <?php  //echo '<pre>' . print_r($companies, true) . '</pre>' ?>
					<?php foreach ($companies as $key => $value) { ?>
											<?php  //echo '<pre>' . print_r($value, true) . '</pre>' ?>
						<tr>
							<td><a href="edit_company/<?=$value['companyId']?>"><?= $value['name']?></a></td>
                            <td><?= $value['country']?></td>
                            <td><?= $value['vat']?></td>
                            <td><?= $value['type']?></td>
							<?php if ($_SESSION['role'] == 'admin') { ?>
                                <td><a href="edit_company/<?=$value['companyId']?>"><i class="fa fa-edit"></i></a></td>
							    <td><a href="delete_company/<?=$value['companyId']?>"><i class="fa fa-trash"></i></a></td>
						    <?php } ?>
                        </tr>
					<?php } ?>
				</table>
			</div>
			<div>
<<<<<<< HEAD
				<h2><a href="?page=invoice">Invoices</a></h2>
=======
				<h1><a href="/invoice">Invoices</a></h1>
>>>>>>> main
				<table>
					<caption>List of last five invoices</caption>
					<tr>
						<th>Number</th>
						<th>Date</th>
						<th>Company</th>
                        <?php if ($_SESSION['role'] == 'admin') { ?>
						    <th colspan="2"></th>
                        <?php } ?>
					</tr>
					<?php foreach ($invoices as $key => $value) { ?>
						<tr>
							<td><a href="invoice_detail&number=<?=$value['number']?>"><?= $value['number']?></a></td>
							<td><?= $value['date']?></td>
							<td><?= $value['name']?></td>
                            <?php if ($_SESSION['role'] == 'admin') { ?>
							    <td><a href="update_invoice/<?=$value['number']?>"><i class="fa fa-edit"></i></a></td>
							    <td><a href="delete_invoice/<?=$value['number']?>" target="blank" meta="refresh"><i class="fa fa-trash"></i></a></td>
							<?php } ?>
                        </tr>
					<?php } ?>
				</table>
			</div>
			<div>
<<<<<<< HEAD
                <h2><a href="persons">Persons</a></h2>
=======
                <h1><a href="people">People</a></h1>
>>>>>>> main
				<table>
					<caption>List of last five people</caption>
					<tr>
						<th>Number</th>
						<th>Firstname Lastname</th>
						<th>E-mail</th>
						<th>Company</th>
                        <?php if ($_SESSION['role'] == 'admin') { ?>
						    <th colspan="2"></th>
                        <?php } ?>
					</tr>
					<?php foreach ($persons as $key => $value) { ?>
						<tr>
							<td><?=$value['id']?></td>
							<td>
								<a href="edit_contact/<?=$value['id']?>"><?= $value['firstname']?> <?= $value['lastname']?></a>
							</td>
							<td class=""><?= $value['email']?></td>
							<td><?= $value['name']?></td>
                            <?php if ($_SESSION['role'] == 'admin') { ?>
							    <td><a href="edit_contact/<?=$value['id']?>"><i class="fa fa-edit"></i></a></td>
							    <td><a href="delete_contact/<?=$value['id']?>" target="blank" meta="refresh"><i class="fa fa-trash"></i></a></td>
						    <?php } ?>
                        </tr>
					<?php } ?>
			</table>
		</div>
	</div>
</section>

<<<<<<< HEAD
<?php require 'views/parts/footer.php'; ?>
=======
<?php require 'views/parts/footer.php'; ?>

>>>>>>> main
