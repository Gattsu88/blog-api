@extends('layouts.app')

@section('title', '| Home')

@section('content')
    <div class="col-md-7 col-lg-7">
        <h2>Blog-Api</h2><br>
        <p id="big">Maecenas lobortis elit vel quam bibendum, vitae hendrerit metus posuere. In hac habitasse platea dictumst. In hac habitasse platea dictumst. Morbi a elit ultricies, iaculis nibh vitae, semper tellus. Donec ac nisi viverra, porttitor ex quis, tincidunt libero. Morbi pulvinar fringilla nibh, nec gravida erat accumsan eu. Etiam eu velit maximus, pharetra diam vel, convallis eros. Fusce malesuada ut dui a auctor. Quisque eu justo sed turpis sollicitudin bibendum.</p>
        <p class="indent">Quisque nec porttitor metus. Maecenas id faucibus ex. Donec pretium tempus metus ac interdum. Maecenas at tellus est. Aenean rutrum arcu facilisis, convallis arcu id, placerat justo. Vestibulum et semper purus. Vivamus ut sapien ut arcu auctor mattis ac ut neque. Nunc dapibus tellus non lectus volutpat rutrum. Cras ut velit justo. Nulla ultricies eros sit amet tortor feugiat, ut ullamcorper tortor hendrerit. Fusce eget tellus sit amet mauris commodo aliquet a a lacus.</p>
        Fusce fringilla viverra arcu non egestas:
        <ul type="circle">
            <li>Maecenas et neque iaculis, posuere ex non, facilisis dui.</li>
            <li>Praesent pharetra felis in tortor convallis, viverra rutrum lacus ultrices.</li>
            <li>Curabitur vestibulum lectus eu fringilla sagittis:
                <ol>
                    <li>In hac habitasse</li>
                    <li>Maecenas at tellus est</li>
                    <li>Aenean rutrum arcu facilisis</li>
                    <li>Morbi a elit ultricies</li>
                </ol>
            </li>
            <li>Etiam in nisl sed dolor sodales tincidunt a vel velit.</li>
        </ul>
        <p class="indent">Vivamus non interdum ipsum, non suscipit massa. Mauris id arcu vitae purus ornare dapibus sit amet vel nunc. Donec eleifend nunc augue, nec aliquam erat pulvinar non. Morbi ut dui porttitor, dictum mi fermentum, aliquam velit. Cras lobortis orci laoreet ligula euismod rutrum. Quisque semper rutrum quam vitae blandit. Etiam vel sagittis justo, sagittis viverra odio. Donec bibendum arcu et risus volutpat suscipit. Quisque aliquet augue lorem, feugiat malesuada neque lacinia nec.</p>
    </div>

    <div class="col-md-4 col-lg-4 offset-md-1">
        <div class="row p-3">
            <div class="card">
                <div class="card-header">
                    <h4>API links --In progress--</h4>
                </div>
                <ul class="list-group list-group-flush list-unstyled" style="padding: 10px;">
                    <li class="my-1"><a href="">API 1</a></li>
                    <li class="my-1"><a href="">API 2</a></li>
                </ul>
            </div>
        </div>

        <div class="row p-3">
            <div class="card">
                <div class="card-header">
                    <h4>Newest articles</h4>
                </div>
                <ul class="list-group list-group-flush list-unstyled" style="padding: 10px;">
                    @foreach($latestArticles as $article)
                        <li class="my-1">* <a id="homeArticle" href="/articles/{{ $article->id }}">{{ $article->title }}<br><span style="font-size: 10px; margin: 0px; float: right;">{{ $article->created_at }}</span></a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
