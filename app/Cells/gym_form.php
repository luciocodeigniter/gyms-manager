<div class="row">

    <div class="form-group col-md-4">
        <label for="name">Nome</label>
        <input type="text" class="form-control" name="name" value="<?php echo old('name', $gym->name); ?>" id="name" aria-describedby="nameHelp" placeholder="Nome">
    </div>


    <div class="form-group col-md-4">
        <label for="phone">Telefone</label>
        <input type="tel" class="form-control phone_with_ddd" name="phone" value="<?php echo old('phone', $gym->phone); ?>" id="phone" aria-describedby="phoneHelp" placeholder="Telefone">
    </div>


    <div class="form-group col-md-4">
        <label for="email">E-mail</label>
        <input type="email" class="form-control" name="email" value="<?php echo old('email', $gym->email); ?>" id="email" aria-describedby="emailHelp" placeholder="E-mail">
    </div>

    <div class="form-group col-md-4">
        <label for="manager">Gerente</label>
        <input type="text" class="form-control" name="manager" value="<?php echo old('manager', $gym->manager); ?>" id="manager" aria-describedby="managerHelp" placeholder="Gerente">
    </div>



    <div class="form-group col-md-4">
        <label for="address">Endereço</label>
        <input type="text" class="form-control" name="address" value="<?php echo old('address', $gym->address); ?>" id="address" aria-describedby="addressHelp" placeholder="Endereço">
    </div>


    <div class="form-group col-md-4">
        <label for="number_students">Nº de estudantes</label>
        <input type="number" class="form-control" name="number_students" value="<?php echo old('number_students', $gym->number_students); ?>" id="number_students" aria-describedby="number_studentsHelp" placeholder="Nº de estudantes">
    </div>


    <div class="col-md-12 mb-3 mt-4">

        <div class="custom-control custom-checkbox">
            <?php echo form_hidden('active', 0); ?>
            <input type="checkbox" name="active" value="1" <?php if ($gym->active) : ?> checked <?php endif; ?> class="custom-control-input" id="active">
            <label class="custom-control-label" for="active">Registro ativo</label>
        </div>

    </div>

</div>


<button type="submit" class="btn btn-primary mt-4">Salvar</button>

<a href="<?php echo route_to('gyms') ?>" class="btn btn-secondary mt-4">Voltar</a>