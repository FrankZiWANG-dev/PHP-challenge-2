
<?php require 'views/parts/header.php'; ?>

<style>
    .invisible { display: none; }
</style>
<section>
	<div class="">
		<div class="">
    <span>
      <button <?=$create?> type="button" name="addInvoice"><a href="create-invoice">Add invoice</a></button>
      <button <?=$create?> type="button" name="addCompany"><a href="create-company">Add company</a></button>
      <button <?=$create?> type="button" name="addPerson"><a href="create-person">Add person</a></button>
        <!--<button </?=$create?> type="button" name="dashboard"><a href="dashboard">goto dashboard</a></button>-->
    </span>
		</div>
		<div class="">
			<div>
				<div class="">
        <span>
          <button type="button" name="client"><a class="nav-link" href="clients">Client</a></button>
          <button type="button" name="provider"><a class="nav-link" href="providers">Provider</a></button>
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
							<td><a href="edit_company/<?=$value['companyId']?>"><?= $value['name']?></a></td>
                            <td><?= $value['country']?></td>
                            <td><?= $value['vat']?></td>
                            <td><?= $value['type']?></td>
							<td <?=$edit_delete?>><a href="edit_company/<?=$value['companyId']?>"><i class="fa fa-edit"></i></a></td>
							<td <?=$edit_delete?>><a href="delete_company/<?=$value['companyId']?>"><i class="fa fa-trash"></i></a></td>
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
							<td <?=$edit_delete?>><a href="update_invoice/<?=$value['number']?>"><i class="fa fa-edit"></i></a></td>
							<td <?=$edit_delete?>><a href="delete_invoice/<?=$value['number']?>" target="blank" meta="refresh"><i class="fa fa-trash"></i></a></td>
						</tr>
					<?php } ?>
				</table>
			</div>
			<div>
                <h1><a href="people">People</a></h1>
				<table>
					<caption>List of last five people</caption>
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
								<a href="edit_contact/<?=$value['id']?>"><?= $value['firstname']?> <?= $value['lastname']?></a>
							</td>
							<td class=""><?= $value['email']?></td>
							<td><?= $value['name']?></td>
							<td <?=$edit_delete?>><a href="edit_contact/<?=$value['id']?>"><i class="fa fa-edit"></i></a></td>
							<td <?=$edit_delete?>><a href="delete_contact/<?=$value['id']?>" target="blank" meta="refresh"><i class="fa fa-trash"></i></a></td>
						</tr>
					<?php } ?>
				</table>
			</div>
		</div>
	</div>
</section>

<?php require 'views/parts/footer.php'; ?>

