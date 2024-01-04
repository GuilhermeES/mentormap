<!-- Modal -->
<div class="modal fade modal__resultado" id="modal-{{$userQuiz->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-body">
            <div class="title">
                {{$userQuiz->result->title}}
            </div>
            {!!  $userQuiz->result->content !!}
        </div>
        <div class="modal-footer">
            <button type="button" class="btn button-dashboard" data-bs-dismiss="modal">Fechar</button>
        </div>
        </div>
    </div>
</div>