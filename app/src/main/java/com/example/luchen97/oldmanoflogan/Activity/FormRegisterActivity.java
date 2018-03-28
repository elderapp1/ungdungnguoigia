package com.example.luchen97.oldmanoflogan.Activity;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.text.TextUtils;
import android.view.View;
import android.widget.AutoCompleteTextView;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.example.luchen97.oldmanoflogan.R;
import com.example.luchen97.oldmanoflogan.Server.Server;
import com.example.luchen97.oldmanoflogan.choisePhotoActivity;

import java.util.HashMap;
import java.util.Map;

public class FormRegisterActivity extends AppCompatActivity {
    AutoCompleteTextView user, pass, repass, info;
    Button register;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_form_register);
        anhxa();
    }

    private void init() {
        String username = user.getText().toString();
        String password = pass.getText().toString();
        String repassword = repass.getText().toString();
        String infomation = info.getText().toString();
        if (TextUtils.isEmpty(username)) {
            Toast.makeText(this, "Vui lòng điền Username!", Toast.LENGTH_SHORT).show();
        } else if (TextUtils.isEmpty(password)) {
            Toast.makeText(this, "Vui lòng điền Password!", Toast.LENGTH_SHORT).show();
        } else if (TextUtils.isEmpty(repassword)) {
            Toast.makeText(this, "Vui lòng điền lại Password!", Toast.LENGTH_SHORT).show();
        } else if (!password.equals(repassword)) {
            Toast.makeText(this, "Vui lòng điền  Password trùng với Repassword!", Toast.LENGTH_SHORT).show();
        } else {
            pushData(username, password, infomation);
        }
    }

    private void pushData(final String username, final String password, final String infomation) {
        {
            final RequestQueue requestQueue = Volley.newRequestQueue(getApplicationContext());
            StringRequest stringRequest = new StringRequest(Request.Method.POST, Server.URLRegister, new Response.Listener<String>() {
                @Override
                public void onResponse(String response) {
                    if (response.equals("0")) {
                        Toast.makeText(FormRegisterActivity.this, "Username của bạn đã được sử dụng,vui long nhập lại!", Toast.LENGTH_SHORT).show();
                    } else if(response.equals("1")) {
                        Toast.makeText(FormRegisterActivity.this, "Tạo tài khoản thành công,đăng nhập lại để sử dụng!" + response, Toast.LENGTH_SHORT).show();

                    }else {
                        Toast.makeText(FormRegisterActivity.this, "có lỗi trong quá trình khởi tạo! "+response, Toast.LENGTH_SHORT).show();
                    }
                }
            }, new Response.ErrorListener() {
                @Override
                public void onErrorResponse(VolleyError error) {
                    Toast.makeText(FormRegisterActivity.this, "Error: " + error, Toast.LENGTH_SHORT).show();
                }
            }) {
                @Override
                protected Map<String, String> getParams() throws AuthFailureError {
                    HashMap<String, String> hashMap = new HashMap<>();
                    hashMap.put("username", username);
                    hashMap.put("password", password);
                    hashMap.put("info", infomation);
                    return hashMap;
                }
            };
            requestQueue.add(stringRequest);
        }
    }

    private void anhxa() {
        user = (AutoCompleteTextView) findViewById(R.id.user_res);
        pass = (AutoCompleteTextView) findViewById(R.id.pass_res);
        repass = (AutoCompleteTextView) findViewById(R.id.repass_res);
        info = (AutoCompleteTextView) findViewById(R.id.info_res);
        register = (Button) findViewById(R.id.registerbtn);
        register.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                init();
            }
        });
    }
}
