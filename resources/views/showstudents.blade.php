<div class="data-table">
    <table style="width: 100%;">
        <thead>
            <tr>
                <form action="/filter" method="get">
                    <input type="hidden" name="theascdesc" id="theascdesc" value="{{ request()->input('theascdesc') }}">
                    <input type="hidden" name="orderby" id="orderby" value="{{ request()->input('orderby', old('id')) }}">
                    <th class="input-cell">
                        <span class="table-head-label" onclick="changeorderby('id')">ID</span>
                        <div class="input" style="width: 50px">
                            <input type="number" id="likeid" name="likeid" placeholder="Filter" value="{{ request()->input('likeid', old('')) }}" />
                        </div>
                    </th>
                    <th class="input-cell">
                        <span class="table-head-label" onclick="changeorderby('fname')">Name</span>
                        <div class="input">
                            <input type="text" id="likefname" name="likefname" placeholder="Filter" value="{{ request()->input('likefname', old('')) }}" />
                        </div>
                    </th>
                    <th class="input-cell">
                        <span class="table-head-label" onclick="changeorderby('lname')">Surname</span>
                        <div class="input">
                            <input type="text" id="likelname" name="likelname" placeholder="Filter" value="{{ request()->input('likelname', old('')) }}" />
                        </div>
                    </th>
                    <th class="input-cell">
                        <span class="table-head-label" onclick="changeorderby('snumber')">Number</span>
                        <div class="input" style="width: 50px">
                            <input type="number" id="likesnumber" name="likesnumber" placeholder="Filter" value="{{ request()->input('likesnumber', old('')) }}" />
                        </div>
                    </th>
                    <th class="input-cell">
                        <span class="table-head-label" onclick="changeorderby('department')">Department</span>
                        <div class="input">
                            <input type="text" id="likedepartment" name="likedepartment" placeholder="Filter" value="{{ request()->input('likedepartment', old('')) }}" />
                        </div>
                    </th>
                    <th class="input-cell">
                        <span class="table-head-label" onclick="changeorderby('age')">Age</span>
                        <div class="input" style="width: 50px">
                            <input type="number" id="likeage" name="likeage" placeholder="Filter" value="{{ request()->input('likeage', old('')) }}" />
                        </div>
                    </th>
                    <th> <button type="submit" class="button button-fill color-green" id="filterbutton">Filter</button>
                    </th>
                    <th>
                        <input type="button" data-panel=".panel-right" class="panel-open col button button-fill color-blue" value="New">
                    </th>
                </form>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->fname }}</td>
                <td>{{ $item->lname }}</td>
                <td>{{ $item->snumber }}</td>
                <td>{{ $item->department }}</td>
                <td>{{ $item->age }}</td>
                <td>
                    <input type="button" data-panel=".panel-left" class="panel-open col button button-fill color-yellow" value="update" onclick="changeupdatesid('{{ $item->id }}','{{ $item->fname }}','{{ $item->fname }}','{{ $item->snumber }}','{{ $item->department }}','{{ $item->age }}');">
                </td>
                <form action="deletestudent" method="get">
                    <input type="hidden" id="delid" name="delid" value="{{ $item->id }}">
                    <td> <button class="col button button-fill color-red" type="submit">DEL</button></td>
                </form>
            </tr>
            @endforeach

        </tbody>
    </table>


    <!-- pagination -->
    <input type="hidden" id="pagetotal" name="pagetotal" value="{{ $students->total() }}" />
    <input type="hidden" id="pagelast" name="pagelast" value="{{ $students->lastPage() }}" />
    <input type="hidden" id="pagecurrent" name="pagecurrent" value="{{ request()->input('page', old('1')) }}" />
    <div class="data-table-footer">
        <div class="data-table-rows-select">
            <p style="font-size: 14px;">Go to page:</p>

            <div class="input input-dropdown">
                <select onchange="gopage(this.value)">
                    @for($i=1; $i<=$students->lastPage(); $i++)
                        <option value="{{ $i }}" value="{{ $i }}"> {{ $i }} </option>
                        @endfor
                </select>
            </div>
        </div>



        <div class="data-table-pagination">
            <a class="link">
                <i class="icon icon-prev color-gray" onclick="gopage('previous')"></i>
            </a>
            <a class="link">
                <i class="icon icon-next color-gray" onclick="gopage('next')"></i>
            </a>
        </div>
    </div>