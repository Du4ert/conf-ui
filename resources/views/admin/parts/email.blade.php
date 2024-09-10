<button type="button" class="btn btn-success coauthor-add-button mt-1 mb-2" data-bs-toggle="modal" data-bs-target="#bulkEmail">
    <i
    class="fa fa-envelope me-2"></i>Рассылка
</button>

<div id="bulkEmail" class="modal fade" tabindex="-1" aria-labelledby="bulkEmailLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bulkEmailLabel">Отправка рассылок</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form id="bulkEmail-form" class="bulkEmail-form" method="POST" action="{{ route('bulk.email') }}">
                    @csrf
                    @foreach ($allUsers as $user)
                      <input type="hidden" name="users[]" value="{{ $user->id }}">
                    @endforeach
                    <div class="row ms-2">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="selectedUsers" id="selectedUsers1" value="1" checked>
                            <label class="form-check-label" for="selectedUsers1">
                              Отправить выбранным пользователям
                            </label>
                          </div>
                          
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="selectedUsers" id="selectedUsers2" value="2">
                            <label class="form-check-label" for="selectedUsers2">
                              Отправить всем, кроме выбранных
                            </label>
                          </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="row p-md-2">
                                <label for="message" class="col-md-6 col-form-label text-md-end">Текст письма RU</label>
                                <textarea name="message" id="message" class="form-control col-md-6" cols="30" rows="10" required></textarea>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="row p-md-2">
                                <label for="message_en" class="col-md-6 col-form-label text-md-end">Текст письма EN</label>
                                <textarea name="message_en" class="form-control col-md-6" id="message_en" cols="30" rows="10" required></textarea>
                            </div>
                        </div>
                    </div>
                    
                </form>
            </div>
            <div class="modal-footer">
                <button class="bulkEmail-close btn btn-secondary" type="button" data-bs-dismiss="modal">Отменить<i
                        class="fa fa-cancel ms-2"></i></button>
                <button type="submit" class="bulkEmail-send btn btn-primary" form="bulkEmail-form">Отправить<i
                        class="fa fa-envelope ms-2"></i></button>
            </div>
        </div>
    </div>
</div>