@extends('client.layouts.master')
@section('content')
@section('title')
    {{ "Help" }}
@endsection
<!-- START CONTENT -->
<section class="flex-1 py-6 overflow-y-auto">
    <div class="min-h-full px-4 sm:px-6">

        <div class="space-y-8">
            <div class="space-y-4">
                <!-- START SUPPORT & CONTACT DETAILS -->
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
                        <div class="px-4 py-5 sm:p-6">
                            <div class="flex flex-col gap-3 sm:flex-row sm:items-start">
                                <div class="shrink-0">
                                    <svg aria-hidden="true" class="w-8 h-8 text-blue-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M15 5l0 2"></path>
                                        <path d="M15 11l0 2"></path>
                                        <path d="M15 17l0 2"></path>
                                        <path d="M5 5h14a2 2 0 0 1 2 2v3a2 2 0 0 0 0 4v3a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-3a2 2 0 0 0 0 -4v-3a2 2 0 0 1 2 -2">
                                        </path>
                                    </svg>
                                </div>

                                <div>
                                    <h2 class="text-lg font-semibold text-gray-900">
                                        Open a support ticket
                                    </h2>
                                    <p class="mt-1 text-sm font-normal text-gray-600">
                                        Check out the new dashboard view. Pages now load faster.
                                    </p>
                                    <div class="mt-4">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#supportTicketModal">
                                            Submit Ticket
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white border border-gray-200 rounded-lg shadow-sm">
                        <div class="px-4 py-5 sm:p-6">
                            <div class="flex flex-col gap-3 sm:flex-row sm:items-start">
                                <div class="shrink-0">
                                    <svg aria-hidden="true" class="w-8 h-8 text-blue-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M4 14v-3a8 8 0 1 1 16 0v3"></path>
                                        <path d="M18 19c0 1.657 -2.686 3 -6 3"></path>
                                        <path d="M4 14a2 2 0 0 1 2 -2h1a2 2 0 0 1 2 2v3a2 2 0 0 1 -2 2h-1a2 2 0 0 1 -2 -2v-3z"></path>
                                        <path d="M15 14a2 2 0 0 1 2 -2h1a2 2 0 0 1 2 2v3a2 2 0 0 1 -2 2h-1a2 2 0 0 1 -2 -2v-3z">
                                        </path>
                                    </svg>
                                </div>

                                <div>
                                    <h2 class="text-lg font-semibold text-gray-900">
                                        Talk with our team
                                    </h2>
                                    <p class="mt-1 text-sm font-normal text-gray-600">
                                        Check out the new dashboard view. Pages now load faster.
                                    </p>

                                    <ul class="mt-4 space-y-3 text-base font-medium text-gray-900">
                                        <li class="flex items-center gap-3">
                                            <svg aria-hidden="true" class="w-5 h-5 text-primary-600 shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z">
                                                </path>
                                                <path d="M3 7l9 6l9 -6"></path>
                                            </svg>
                                            {{$accountant['accountant']['support_email_id']}}
                                        </li>

                                        <li class="flex items-center gap-3">
                                            <svg aria-hidden="true" class="w-5 h-5 text-primary-600 shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2">
                                                </path>
                                            </svg>
                                            {{$accountant['accountant']['support_phone']}}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END SUPPORT & CONTACT DETAILS -->

                <!-- START SUPPORT TICKETS -->
                <div class="overflow-hidden bg-white border border-gray-200 rounded-lg shadow-sm">
                    <div class="px-4 py-4 sm:px-6">
                        <h2 class="text-lg font-semibold text-gray-900">
                            Support Tickets
                        </h2>
                    </div>

                    <div class="flow-root border-t border-gray-200">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="py-3.5 pl-4 pr-3 w-80 sm:w-auto text-left text-xs font-semibold text-gray-500 whitespace-nowrap sm:pl-6">
                                            Ticket Details
                                        </th>
                                        <th scope="col" class="px-3 py-3.5 text-left text-xs font-semibold whitespace-nowrap text-gray-500">
                                            Created On
                                        </th>
                                        <th scope="col" class="px-3  py-3.5 text-left text-xs font-semibold whitespace-nowrap text-gray-500">
                                            Status
                                        </th>
                                        <th scope="col" class="relative text-left text-xs font-semibold text-gray-500 whitespace-nowrap py-3.5 pl-3 pr-4 sm:pr-6">
                                        </th>
                                    </tr>
                                </thead>

                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($support_tickets as $row)
                                    <tr>
                                        <td class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                            <span>
                                                {{$row['subject']}}
                                            </span>
                                            <span class="block mt-px text-xs text-gray-500">
                                                {{formatedSupportId($row['id'])}}
                                            </span>
                                        </td>
                                        <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
                                            {{dateFormat($row['created_at'], 'd M Y')}}
                                        </td>
                                        <td class="px-3 py-4 text-sm text-gray-600 whitespace-nowrap">
                                            {!! getSupportTicketStatus($row['status']) !!}
                                        </td>
                                        <td class="relative py-4 pl-3 pr-4 whitespace-nowrap sm:pr-6">
                                            <div class="flex items-center gap-4">
                                                <a href="#" title="View Conversation" class="btn btn-icon btn-secondary-light btn-icon-transparent" aria-label="View Conversation" data-microtip-position="top" role="tooltip" data-toggle="drawer" data-target="#conversationView">
                                                    <span class="sr-only">
                                                        View Conversation
                                                    </span>
                                                    <svg aria-hidden="true" class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M8 9h8"></path>
                                                        <path d="M8 13h5"></path>
                                                        <path d="M12 21l-.5 -.5l-2.5 -2.5h-3a3 3 0 0 1 -3 -3v-8a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v4.5">
                                                        </path>
                                                        <path d="M18 18m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                                                        <path d="M20.2 20.2l1.8 1.8"></path>
                                                    </svg>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @if(count($support_tickets) ==0)
                                    <tr>
                                        <td colspan="3">
                                            <center>No data found</center>
                                        </td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- END SUPPORT TICKETS -->
            </div>

            <hr class="border-gray-200">

            <!-- START FAQS -->
            <div class="space-y-6">
                <h2 class="text-lg font-semibold text-gray-900">
                    FAQs
                </h2>
                <div class="space-y-4 accordion" id="accordionExample">
                    @foreach($faqs as $f)
                    <div class="overflow-hidden transition-all duration-150">
                        <dt class="accordion-header" id="heading_{{ $f['id'] }}">
                            <button type="button" class="flex items-start justify-between w-full text-base font-medium text-left text-gray-900 transition-all duration-150 focus:outline-none" data-toggle="collapse" data-target="#collapse_{{ $f['id'] }}" aria-expanded="true" aria-controls="collapse_{{ $f['id'] }}">
                                <span>
                                    {!! $f['question'] !!}
                                </span>
                                <span class="flex items-center ml-6 transition-all duration-300 focus:outline-none accordion-control h-7">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-5 h-5">
                                        <path d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </span>
                            </button>
                        </dt>

                        <dd id="collapse_{{ $f['id'] }}" class="hidden accordion-collapse" aria-labelledby="heading_{{ $f['id'] }}" data-parent="#accordionExample">
                            <div class="pt-2 pb-4">
                                <p class="text-sm leading-6 text-gray-600">
                                    {!! $f['answer'] !!}
                                </p>
                            </div>
                        </dd>
                    </div>
                    @endforeach

                </div>
            </div>
            <!-- END FAQS -->
        </div>

    </div>
</section>
<!-- END CONTENT -->

<!-- START CONVERSATION VIEW -->
<aside class="fixed top-0 bottom-0 right-0 z-30 flex flex-col invisible w-full max-w-xs transition-all duration-300 ease-in-out translate-x-full bg-white border-l border-gray-200 outline-none sm:max-w-md drawer" id="conversationView" aria-labelledby="drawerRightLabel" aria-hidden="true" tabindex="-1">
    <div class="flex items-start justify-between gap-6 p-4">
        <div class="flex-1 min-w-0">
            <h5 class="text-lg font-bold leading-tight" id="drawerRightLabel">
                Lorem ipsum dolor sit amet consectetur
            </h5>
            <div class="flex items-center gap-3 mt-2">
                <span class="badge badge-default-light">
                    <svg aria-hidden="true" class="w-3.5 h-3.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M12 6l0 -3"></path>
                        <path d="M16.25 7.75l2.15 -2.15"></path>
                        <path d="M18 12l3 0"></path>
                        <path d="M16.25 16.25l2.15 2.15"></path>
                        <path d="M12 18l0 3"></path>
                        <path d="M7.75 16.25l-2.15 2.15"></path>
                        <path d="M6 12l-3 0"></path>
                        <path d="M7.75 7.75l-2.15 -2.15"></path>
                    </svg>
                    In Progress
                </span>

                <p class="text-sm font-normal text-gray-500">
                    SR#136354745
                </p>
            </div>
        </div>

        <div class="absolute top-4 right-4">
            <button type="button" class="text-gray-400 bg-white rounded-md hover:text-gray-500 focus:outline-none btn-close" data-dismiss="drawer" aria-label="Close">
                <span class="sr-only">
                    Close
                </span>
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M18 6l-12 12"></path>
                    <path d="M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </div>

    <div class="flex flex-col flex-1 p-4 space-y-6 overflow-y-auto border-t border-b border-gray-200 grow">

        <div class="relative">
            <div class="absolute inset-0 flex items-center" aria-hidden="true">
                <div class="w-full border-t border-gray-200"></div>
            </div>
            <div class="relative flex justify-center">
                <div class="px-2 bg-white">
                    <span class="inline-flex items-center px-3 py-1 text-[10px] font-medium tracking-wider text-gray-500 uppercase rounded-full bg-gray-50 ring-1 ring-inset ring-gray-500/10">
                        Today
                    </span>
                </div>
            </div>
        </div>

        <div class="relative max-w-xs space-y-2">
            <div class="flex items-center gap-1.5">
                <img class="w-6 h-6 bg-gray-300 rounded-full shrink-0" src="../images/company-logo.png" alt="">
                <span class="text-sm font-medium text-gray-900">
                    Rudra Consultancy
                </span>
            </div>

            <div class="inline-flex py-3 pl-4 pr-6 text-base font-normal text-gray-900 bg-gray-100 rounded-tl-sm rounded-xl">
                Thanks Aarush! Almost there. I'll work on making those changes you suggested and will shoot it over.
            </div>

            <span class="block text-xs font-normal text-gray-500">
                Thursday 10:16am
            </span>
        </div>

        <div class="relative max-w-xs space-y-2">
            <div class="flex items-center gap-1.5">
                <img class="w-6 h-6 bg-gray-300 rounded-full shrink-0" src="../images/company-logo.png" alt="">
                <span class="text-sm font-medium text-gray-900">
                    Rudra Consultancy
                </span>
            </div>

            <div class="inline-flex py-3 pl-4 pr-6 text-base font-normal text-gray-900 bg-gray-100 rounded-tl-sm rounded-xl">
                Hey Aarush, I've finished with the requirements doc! I made some notes in the gdoc as well for
                Phoenix to look over.
            </div>

            <span class="block text-xs font-normal text-gray-500">
                Thursday 10:16am
            </span>
        </div>

        <div class="flex justify-end">
            <div class="max-w-xs space-y-2">
                <div class="flex items-center gap-1.5">
                    <span class="text-sm font-medium text-gray-900">
                        You
                    </span>
                </div>

                <div class="inline-flex px-4 py-3 text-base font-normal text-white bg-blue-600 rounded-tr-sm rounded-xl">
                    Awesome! Thanks. I’ll look at this today.
                </div>

                <span class="block text-xs font-normal text-right text-gray-500">
                    Thursday 11:41am
                </span>
            </div>
        </div>

        <div class="relative max-w-xs space-y-2">
            <div class="flex items-center gap-1.5">
                <img class="w-6 h-6 bg-gray-300 rounded-full shrink-0" src="../images/company-logo.png" alt="">
                <span class="text-sm font-medium text-gray-900">
                    Rudra Consultancy
                </span>
            </div>

            <div class="inline-flex py-3 pl-4 pr-6 text-base font-normal text-gray-900 bg-gray-100 rounded-tl-sm rounded-xl">
                No rush though — we still have to wait for Mahesh's designs.
            </div>

            <span class="block text-xs font-normal text-gray-500">
                Thursday 10:16am
            </span>
        </div>

        <div class="relative max-w-xs space-y-2">
            <div class="flex items-center gap-1.5">
                <img class="w-6 h-6 bg-gray-300 rounded-full shrink-0" src="../images/company-logo.png" alt="">
                <span class="text-sm font-medium text-gray-900">
                    Rudra Consultancy
                </span>
            </div>

            <div class="inline-flex py-3 pl-4 pr-6 text-base font-normal text-gray-900 bg-gray-100 rounded-tl-sm rounded-xl">
                Hey Aarush, can you please review the latest design when you can?
            </div>

            <span class="block text-xs font-normal text-gray-500">
                Thursday 10:16am
            </span>
        </div>

        <div class="flex justify-end">
            <div class="max-w-xs space-y-2">
                <div class="flex items-center gap-1.5">
                    <span class="text-sm font-medium text-gray-900">
                        You
                    </span>
                </div>

                <div class="inline-flex px-4 py-3 text-base font-normal text-white bg-blue-600 rounded-tr-sm rounded-xl">
                    Sure thing, I'll have a look today. They're looking great!
                </div>

                <span class="block text-xs font-normal text-right text-gray-500">
                    Thursday 11:41am
                </span>
            </div>
        </div>

        <div class="flex justify-end">
            <div class="max-w-xs space-y-2">
                <div class="flex items-center gap-1.5">
                    <span class="text-sm font-medium text-gray-900">
                        You
                    </span>
                </div>

                <div class="inline-flex px-4 py-3 text-base font-normal text-white bg-blue-600 rounded-tr-sm rounded-xl">
                    Hey Olivia, can you please review the latest design when you can?
                </div>

                <span class="block text-xs font-normal text-right text-gray-500">
                    Thursday 11:41am
                </span>
            </div>
        </div>

    </div>

    <div class="p-4">
        <div class="relative">
            <label for="" class="sr-only">
                Write Message
            </label>
            <input type="text" id="" name="" placeholder="Write your reply here..." class="block w-full py-3 pl-3 pr-24 text-sm text-gray-900 placeholder-gray-500 bg-white border-gray-300 rounded-lg caret-blue-600 focus:ring-1 focus:ring-blue-600 focus:border-blue-600 focus:outline-none">
            <div class="absolute flex items-center bottom-1 right-1">
                <button type="submit" class="inline-flex items-center justify-center gap-2 p-2 text-sm font-semibold text-blue-600 transition-all duration-150 border border-transparent rounded-md shadow-xs hover:bg-blue-600 hover:text-white focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path d="m21.426 11.095-17-8A1 1 0 0 0 3.03 4.242l1.212 4.849L12 12l-7.758 2.909-1.212 4.849a.998.998 0 0 0 1.396 1.147l17-8a1 1 0 0 0 0-1.81z">
                        </path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</aside>
<!-- END CONVERSATION VIEW -->

<!-- START CREATE A SUPPORT TICKET MODAL -->
<div class="fixed inset-0 z-30 invisible w-full h-full overflow-hidden transition-all duration-200 ease-in-out outline-none opacity-0 modal" id="supportTicketModal" aria-labelledby="supportTicketModalLabel" role="dialog" aria-hidden="true" tabindex="-1">
    <div class="fixed inset-0 z-10 invisible w-screen h-screen transition-opacity duration-200 ease-in-out bg-gray-600 opacity-0 pointer-events-none modal-overlay" tabindex="-1"></div>
    <div class="relative z-20 flex items-center justify-center w-auto h-full p-4 transition-all duration-200 ease-in-out scale-75 pointer-events-none modal-dialog sm:mx-auto sm:w-full sm:max-w-xl">
        <div class="relative flex flex-col w-full max-h-full overflow-hidden bg-white border border-gray-200 shadow-xl outline-none pointer-events-auto rounded-xl sm:m-4" role="document">
            <div class="absolute top-0 right-0 hidden pt-4 pr-4 sm:block">
                <button type="button" class="text-gray-400 bg-white rounded-md hover:text-gray-500 focus:outline-none btn-close" data-dismiss="modal" aria-label="Close">
                    <span class="sr-only">
                        Close
                    </span>
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M18 6l-12 12"></path>
                        <path d="M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <div class="p-4 sm:p-6">
                <h5 class="text-lg font-semibold text-gray-900" id="exampleModalToggleLabel">
                    Create a Support Ticket
                </h5>
                <p class="mt-1 text-sm font-normal text-gray-600">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid pariatur, ipsum similique veniam.
                </p>
            </div>
            <form method="POST" enctype="multipart/form-data" action="{{ route('client_add_support') }}">
                @csrf
                <div class="flex-1 px-4 pb-4 overflow-y-auto sm:px-6 sm:pb-6 grow">
                    <div class="grid grid-cols-1 gap-y-5">
                        <div class="input-group">
                            <label for="" class="required">
                                Subject
                            </label>
                            <div class="mt-1.5 input-wrapper">
                                <input type="text" name="subject" class="form-input" required>
                            </div>
                        </div>

                        <div class="input-group">
                            <label for="" class="required">
                                Content
                            </label>
                            <div class="mt-1.5 input-wrapper">
                                <textarea name="content" class="resize-y form-input" rows="3" required></textarea>
                            </div>
                        </div>

                        <div class="input-group">
                            <label for="" class="">
                                Attachment
                            </label>
                            <div class="flex mt-1.5 justify-center px-6 py-10 transition-all duration-150 border border-gray-300 border-dashed rounded-lg bg-gray-25 hover:bg-gray-50">
                                <div class="text-center">
                                    <div class="flex text-sm leading-6 text-gray-600">
                                        <label for="file-upload" class="relative font-semibold bg-transparent rounded-md cursor-pointer text-primary-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-primary-600 focus-within:ring-offset-2 hover:text-primary-500">
                                            <span>Upload a file</span>
                                            <input id="file-upload" name="attachment" type="file" class="sr-only">
                                        </label>
                                        <p class="pl-1">or drag and drop</p>
                                    </div>
                                    <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-center gap-4 mt-4 sm:mt-6">
                        <button type="button" class="w-full btn btn-secondary" data-dismiss="modal" aria-label="Close Modal">
                            Cancel
                        </button>

                        <button type="submit" class="w-full btn btn-primary">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END CREATE A SUPPORT TICKET MODAL -->

@endsection