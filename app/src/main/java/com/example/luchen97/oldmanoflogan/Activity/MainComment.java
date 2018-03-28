package com.example.luchen97.oldmanoflogan.Activity;

import android.os.Bundle;
import android.support.annotation.Nullable;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.widget.ListView;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonArrayRequest;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.example.luchen97.oldmanoflogan.Adapter.CommentAdp;
import com.example.luchen97.oldmanoflogan.Entries.Comment;
import com.example.luchen97.oldmanoflogan.Entries.NewFeedOfMe;
import com.example.luchen97.oldmanoflogan.Server.Server;
import com.example.luchen97.oldmanoflogan.R;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.Map;

/**
 * Created by LUCHEN97 on 3/22/2018.
 */

public class MainComment extends AppCompatActivity {
    ListView listView;
    ArrayList<Comment> comments;
    CommentAdp commentAdp;
    int id = 0;
    String username = "";
    String commnet = "";

    @Override
    protected void onCreate(@Nullable Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_comment);
        anhxa();
        pushData();
    }

    private void pushData() {
        final int idnewfeed = getIntent().getIntExtra("id", 0);
        Toast.makeText(this, "" + idnewfeed, Toast.LENGTH_SHORT).show();
        RequestQueue requestQueue = Volley.newRequestQueue(getApplicationContext());
        StringRequest stringRequest = new StringRequest(Request.Method.POST, Server.URLComment, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                if (response == null) {
                    Toast.makeText(MainComment.this, "Không có dữ liệu comment với bài viết hiện tại", Toast.LENGTH_SHORT).show();
                } else {
                       Toast.makeText(MainComment.this, "Loading... " + response, Toast.LENGTH_SHORT).show();
                    readData(response);
                }
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Toast.makeText(MainComment.this, "Error: " + error, Toast.LENGTH_SHORT).show();
            }
        }) {
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                HashMap<String, String> hashMap = new HashMap<>();
                hashMap.put("id", String.valueOf(idnewfeed));
                return hashMap;
            }
        };
        requestQueue.add(stringRequest);
    }

    private void readData(String response) {
        String data = response;
        try {
            JSONArray jsonArray = new JSONArray(data);
            for (int i = 0; i < jsonArray.length(); i++) {
                JSONObject jsonObject = (JSONObject) jsonArray.get(i);
                id = jsonObject.getInt("id");
                username = jsonObject.getString("username");
                commnet = jsonObject.getString("status");
                Comment comment = new Comment(id, username, commnet);
                comments.add(comment);
                commentAdp.notifyDataSetChanged();
                //   Toast.makeText(getContext(), "dđ"+status_newfeed, Toast.LENGTH_SHORT).show();

            }
        } catch (JSONException e) {
            e.printStackTrace();
        }

    }

    private void anhxa() {
        listView = (ListView) findViewById(R.id.commentlist);
        comments = new ArrayList<>();
        commentAdp = new CommentAdp(comments, getApplicationContext());
        listView.setAdapter(commentAdp);
    }

}
