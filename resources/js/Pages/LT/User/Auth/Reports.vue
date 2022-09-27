<!-- <script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Jetstream/Welcome.vue';
import { Link } from '@inertiajs/inertia-vue3'
</script>

<script>
import Pagination from '@/Components/Pagination'
  
export default {
  components: {
    Pagination
  },
  props: {
    products: Object,
    products2: Array

  },
}
</script>
<template>
    <AppLayout title="Reports">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-md-12 col-12">
            <div class="d-block">
                <h1 class="float-start mt-5">
                    Reports
                </h1>
             <Link href="/user/products/new" class="btn btn-primary float-end mt-3 mb-3">Add New Reports</Link>

            </div>
            <div class="clearfix"></div>
             <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header"><b><a :href="`${username}`">{{username}}</a></b> Report for {{Helper::get_report_problem_info($report->report_problem)}}</div>

                <div class="card-body row">
                Message : {{$report->report_message}} <br>
Documents :
@foreach(Helper::files_checker($report->report_id,'report') as $filename)
                 <div class="col-6">
                <a href="/{{$filename->file_path}}"> {{Helper::make_thumbnail("/".$filename->file_path)}}</a>
                </div>
                @endforeach


Sender : <a href="/{{Helper::find_user_info($report->report_submit_report_user_id)->username}}" target="_blank">{{Helper::find_user_info($report->report_submit_report_user_id)->username}}</a>
<br>
Answer : {{$report->report_reported_user_answer_report}}


<hr>
@foreach(Helper::report_conversations($report->report_id) as $report_conversations_row)
Creator : <a href="/{{Helper::find_user_info($report_conversations_row->report_c_creator_id)->username}}" target="_blank">{{Helper::find_user_info($report_conversations_row->report_c_creator_id)->username}}</a> - {{$report_conversations_row->report_c_message}}<br>


@endforeach()
                </div>
            </div>
        </div>
    </div>
        <pagination class="mt-6" :links="products.links" />
        </div>
    </div>
</div>
    </AppLayout>
</template> -->
