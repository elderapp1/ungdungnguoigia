package com.example.luchen97.oldmanoflogan.Activity;

import android.support.design.widget.TabLayout;
import android.support.v4.app.FragmentManager;
import android.support.v4.view.ViewPager;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.example.luchen97.oldmanoflogan.Adapter.ViewPagerAdp;
import com.example.luchen97.oldmanoflogan.R;
import com.example.luchen97.oldmanoflogan.Server.Server;
import com.squareup.picasso.Picasso;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;
import java.util.Map;

public class MainActivity extends AppCompatActivity {
    ImageView camera;
    ViewPager pager;
    TabLayout tabLayout;
    TextView usermain;
    ImageView avatar;
    FragmentManager fragmentManager;
    int id_user;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        pushData();
        anhxa();

    }

    private void pushData() {
        {
            RequestQueue requestQueue = Volley.newRequestQueue(getApplicationContext());
            StringRequest stringRequest = new StringRequest(Request.Method.POST, Server.URLNewfeedofme, new Response.Listener<String>() {
                @Override
                public void onResponse(String response) {
                    if (response.equals("0")) {
                        Toast.makeText(MainActivity.this, "Không có dữ liệu với  người dùng hiện tại", Toast.LENGTH_SHORT).show();
                    } else {
                  //      Toast.makeText(MainActivity.this, "dulieu: " + response, Toast.LENGTH_SHORT).show();
                        readData(response);
                    }
                }
            }, new Response.ErrorListener() {
                @Override
                public void onErrorResponse(VolleyError error) {
                    Toast.makeText(MainActivity.this, "Error: " + error, Toast.LENGTH_SHORT).show();
                }
            }) {
                @Override
                protected Map<String, String> getParams() throws AuthFailureError {
                    HashMap<String, String> hashMap = new HashMap<>();
                    hashMap.put("id", String.valueOf(id_user));
                    return hashMap;
                }
            };
            requestQueue.add(stringRequest);
        }
    }

    private void readData(String response) {
        fragmentManager = getSupportFragmentManager();
        ViewPagerAdp pagerAdp = new ViewPagerAdp(fragmentManager, response);
        pager.setAdapter(pagerAdp);
        tabLayout.setupWithViewPager(pager);
        pager.addOnPageChangeListener(new TabLayout.TabLayoutOnPageChangeListener(tabLayout));
        tabLayout.setTabsFromPagerAdapter(pagerAdp);
        tabLayout.getTabAt(0).setIcon(R.drawable.home);
        tabLayout.getTabAt(1).setIcon(R.drawable.game);
        tabLayout.getTabAt(2).setIcon(R.drawable.profile);
        tabLayout.getTabAt(3).setIcon(R.drawable.setting);
    }

    private void anhxa() {
        // newFeeds=new ArrayList<>();
        pager = (ViewPager) findViewById(R.id.viewpage);
        tabLayout = (TabLayout) findViewById(R.id.tablayout);
        usermain = (TextView) findViewById(R.id.usermain);
        avatar = (ImageView) findViewById(R.id.avatarmain);
        String data = getIntent().getStringExtra("data");
        try {
            JSONObject jsonObject = new JSONObject(data);
            id_user = jsonObject.getInt("id");
            usermain.setText(jsonObject.getString("username"));
            Picasso.with(getApplicationContext()).load("http://" + Server.Localhost + "/oldman/assets/newfeed/" + jsonObject.getString("avatar")).placeholder(R.drawable.profile).into(avatar);
        } catch (JSONException e) {
            e.printStackTrace();
        }
    }
}
