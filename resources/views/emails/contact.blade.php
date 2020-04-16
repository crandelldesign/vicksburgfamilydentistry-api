@extends('emails.layout')
@section('content')

<br><table style="color: #636466; font-family: \'Helvetica\' \'Arial\', sans-serif; font-weight: normal; text-align: left; line-height: 19px; font-size: 14px;">
  <tr>
      <td valign="top" width="180">Name: </td>
      <td>{{isset($request->contactname)?$request->contactname:'Name'}}</td>
  </tr>
  <tr>
      <td>Email:</td>
      <td>{{isset($request->email)?$request->email:'Email'}}</td>
  </tr>
  <tr>
      <td>Phone:</td>
      <td>{{isset($request->phone)?$request->phone:'Phone'}}</td>
  </tr>
  <tr>
      <td colspan="2">Message:</td>
  </tr>
  <tr>
      <td colspan="2">{{isset($request->message)?$request->message:'Message'}}</td>
  </tr>
</table>

@endsection