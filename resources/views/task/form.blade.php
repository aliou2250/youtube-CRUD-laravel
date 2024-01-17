<div class="row justify-content-center mt-5">
    <div class="col-6">
        <h2 class="h2 mb-3">{{ $task->exists ? 'Modification de la tache '. $task->title : 'Ajouter une tache' }}</h2>
        <form action="{{ route($task->exists ? 'tasks.update' : 'tasks.store', $task) }}" method="post">
            @csrf
            @method($task->exists ? 'put' : 'post')
            <div class="form-floating mb-3">
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="floatingInput" placeholder="Titre" name="title" value="{{ old('title', $task->title) }}" required>
                <label for="floatingInput">Titre</label>
                @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Leave a comment here" id="floatingTextarea" style="height: 100px" required>{{ old('description', $task->description) }}</textarea>
                <label for="floatingTextarea">Description</label>
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3 text-end">
                <button class="btn btn-primary" type="submit">{{ $task->exists ? 'Modifier' : 'Sauvegarder' }}</button>
            </div>
        </form>
    </div>
</div>