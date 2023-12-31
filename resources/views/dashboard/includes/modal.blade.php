<!-- Modal -->
<div class="modal fade" id="modal-{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-body">
            <h3> {{$user->name}} </h3>
            <div class="pt-3"> <strong>ID:</strong> {{$user->id}} </div>
            <div class="pt-1"> <strong>Cargo:</strong> {{$user->cargo}} </div>
            <div class="pt-1"> <strong>E-mail:</strong> {{$user->email}} </div>
            <div class="pt-1"> <strong>Data de nascimento:</strong>  {{ \Carbon\Carbon::parse($user->data_nascimento)->format('d/m/Y') }} </div>
            <div class="pt-1"> <strong>Gênero:</strong> {{$user->sexo}} </div>
            <div class="pt-1"> <strong>Trajetória profissional:</strong> {{$user->trajetoria_profissional}} </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn button-dashboard" data-bs-dismiss="modal">Fechar</button>
        </div>
        </div>
    </div>
</div>