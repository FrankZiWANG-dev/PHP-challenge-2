<div style="margin-bottom:1rem">
<?php require 'views/parts/header.php'; ?>
</div>
<style>
    .invisible { display: none; }
</style>
<section>
	<div class="">
		<div class="">
    <span>
      <button <?=$create?> type="button" name="addInvoice"><a href="?page=admin&action=add_invoice">Add invoice</a></button>
      <button <?=$create?> type="button" name="addCompany"><a href="?page=admin&action=add_company">Add company</a></button>
      <button <?=$create?> type="button" name="addPerson"><a href="?page=admin&action=add_person">Add person</a></button>
    </span>
		</div>
		<div class="">
			<div>
				<div class="">
        <span>
          <button type="button" name="client"><a class="nav-link" href="?page=client">Client</a></button>
          <button type="button" name="provider"><a class="nav-link" href="?page=provider">Provider</a></button>
          <button type="button" name="users"><a class="nav-link" href="users">Users</a></button>
        </span>
				</div>
				
				<h1><a href="?page=company">Companies</a></h1>
				<table >
					<caption>List of last five companies</caption>
					<tr>
						<th>Name</th>
						<th>Country</th>
                        <th>Vat</th>
						<th>Type</th>
						<th colspan="2" <?=$edit_delete?> ></th>
					</tr>
                  <?php  //echo '<pre>' . print_r($companies, true) . '</pre>' ?>
					<?php foreach ($companies as $key => $value) { ?>
											<?php  //echo '<pre>' . print_r($value, true) . '</pre>' ?>
						<tr>
							<td><a href="company_detail&id=<?=$value['id']?>"><?= $value['name']?></a></td>
                            <td><?= $value['country']?></td>
                            <td><?= $value['vat']?></td>
                            <td><?= $value['type']?></td>
							<td <?=$edit_delete?>><a href="admin&action=update_company&id=<?=$value['id']?>"><i class="fa fa-edit"></i></a></td>
							<td <?=$edit_delete?>><a href="admin&admin=delete_company&id=<?=$value['id']?>"><i class="fa fa-trash"></i></a></td>
						</tr>
					<?php } ?>
				</table>
			</div>
			<div>
				<h1><a href="/invoice">Invoices</a></h1>
				<table>
					<caption>List of last five invoices</caption>
					<tr>
						<th>Number</th>
						<th>Date</th>
						<th>Company</th>
						<th colspan="2" <?=$edit_delete?>></th>
					</tr>
					<?php foreach ($invoices as $key => $value) { ?>
						<tr>
							<td><a href="invoice_detail&number=<?=$value['number']?>"><?= $value['number']?></a></td>
							<td><?= $value['date']?></td>
							<td><?= $value['name']?></td>
							<td <?=$edit_delete?>><a href="admin&action=update_invoice&number=<?=$value['number']?>"><i class="fa fa-edit"></i></a></td>
							<td <?=$edit_delete?>><a href="admin&action=delete_invoice&number=<?=$value['number']?>" target="blank" meta="refresh"><i class="fa fa-trash"></i></a></td>
						</tr>
					<?php } ?>
				</table>
			</div>
			<div>
                <h1><a href="persons">Persons</a></h1>
				<table>
					<caption>List of last five persons</caption>
					<tr>
						<th>Number</th>
						<th>Firstname Lastname</th>
						<th class="">E-mail</th>
						<th>Company</th>
						<th colspan="2" <?=$edit_delete?>></th>
					</tr>
					<?php foreach ($persons as $key => $value) { ?>
						<tr>
							<td><?=$value['id']?></td>
							<td>
								<a href="?page=person_detail&id=<?=$value['id']?>"><?= $value['firstname']?> <?= $value['lastname']?></a>
							</td>
							<td class=""><?= $value['email']?></td>
							<td><?= $value['name']?></td>
							<td <?=$edit_delete?>><a href="?page=admin&action=update_person&id=<?=$value['id']?>"><i class="fa fa-edit"></i></a></td>
							<td <?=$edit_delete?>><a href="?page=admin&action=delete_person&id=<?=$value['id']?>" target="blank" meta="refresh"><i class="fa fa-trash"></i></a></td>
						</tr>
					<?php } ?>
				</table>
			</div>
		</div>
	</div>
</section>
<div style="margin-top:1rem">
<?php require 'views/parts/footer.php'; ?>
</div>
