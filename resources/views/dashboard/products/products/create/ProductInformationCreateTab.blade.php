<!-- Start col -->
<div class="card m-b-30">
    <div class="card m-b-30">
        <div class="card-header">
            <h5 class="card-title">{{ __('products/productAdd.categories') }}</h5>
        </div>
        <div class="card-body pt-3">
            <select class="select2-multi-select form-control" name="categories[]" multiple="multiple">
                @if(isset($categories))
                    @if(count($categories) > 0)
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                        @endforeach
                    @endif
                @endif
            </select>
        </div>
    </div>
    
    <!--TODO: Tages for search bar-->
    <div class="card m-b-30">
        <div class="card-header">
            <h5 class="card-title">Tags</h5>
        </div>
        <div class="card-body">
            <div class="product-tags">
                <span class="badge badge-secondary-inverse">New</span>
                <span class="badge badge-secondary-inverse">Latest</span>
                <span class="badge badge-secondary-inverse">Trending</span>
                <span class="badge badge-secondary-inverse">Popular</span>
                <span class="badge badge-secondary-inverse">Sale</span>
            </div>                                
        </div>
        <div class="card-footer">
            <div class="add-product-tags">
                <div class="input-group">
                    <input type="search" class="form-control" placeholder="Add Tags" aria-label="Search" aria-describedby="button-addonTags">
                    <div class="input-group-append">
                        <button class="input-group-text" type="submit" id="button-addonTags">Add</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!--TODO: Product Color Option-->
    <div class="card m-b-30">
        <div class="card-header">
        <h5 class="card-title">{{ __('products/productAdd.color') }}</h5>
        </div>
        <div class="card-body pt-3">
            <div class="custom-checkbox-button">
                <div class="form-check-inline checkbox-primary">
                  <input type="checkbox" id="customCheckboxInline5" name="customCheckboxInline2" checked>
                  <label for="customCheckboxInline5"></label>
                </div>
                <div class="form-check-inline checkbox-secondary">
                  <input type="checkbox" id="customCheckboxInline6" name="customCheckboxInline2">
                  <label for="customCheckboxInline6"></label>
                </div>
                <div class="form-check-inline checkbox-success">
                  <input type="checkbox" id="customCheckboxInline7" name="customCheckboxInline2">
                  <label for="customCheckboxInline7"></label>
                </div>
                <div class="form-check-inline checkbox-danger">
                  <input type="checkbox" id="customCheckboxInline8" name="customCheckboxInline2">
                  <label for="customCheckboxInline8"></label>
                </div>
                <div class="form-check-inline checkbox-warning">
                  <input type="checkbox" id="customCheckboxInline9" name="customCheckboxInline2">
                  <label for="customCheckboxInline9"></label>
                </div>
                <div class="form-check-inline checkbox-info">
                  <input type="checkbox" id="customCheckboxInline10" name="customCheckboxInline2">
                  <label for="customCheckboxInline10"></label>
                </div>
                <div class="form-check-inline checkbox-light">
                  <input type="checkbox" id="customCheckboxInline11" name="customCheckboxInline2">
                  <label for="customCheckboxInline11"></label>
                </div>
                <div class="form-check-inline checkbox-dark">
                  <input type="checkbox" id="customCheckboxInline12" name="customCheckboxInline2">
                  <label for="customCheckboxInline12"></label>
                </div>
            </div>
        </div>
    </div>
    
</div>
