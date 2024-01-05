@props(['blog'])

<div class="card p-3 my-3 shadow-sm">
          <form action="/blogs/{{$blog->slug}}/comments" method="POST">
              @csrf
              <div class="mb-3">
                <textarea name="body" class="form-control border border-0" cols="10" rows="5" placeholder="Comment Here..."></textarea>
                <x-error name="body"/>
              </div>
              <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
          </form>
        </div>