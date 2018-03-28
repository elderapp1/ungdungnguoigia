package com.example.luchen97.oldmanoflogan.Fragment;

import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ListView;
import android.widget.Toast;

import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonArrayRequest;
import com.android.volley.toolbox.Volley;
import com.example.luchen97.oldmanoflogan.Adapter.NewFeedAdp;
import com.example.luchen97.oldmanoflogan.Adapter.NewFeedOfMeAdp;
import com.example.luchen97.oldmanoflogan.Entries.NewFeed;
import com.example.luchen97.oldmanoflogan.Entries.NewFeedOfMe;
import com.example.luchen97.oldmanoflogan.R;
import com.example.luchen97.oldmanoflogan.Server.Server;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;


public class FragOne extends Fragment {
    ListView listView;
    ArrayList<NewFeed> newFeeds;
    NewFeedAdp newFeedAdp;
    int id_newfeed = 0;
    String avatar_user = "";
    String username_newfeed = "";
    String status_newfeed = "";
    String image_newfeed = "";

    public FragOne() {
    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.fragment_frag_one, container, false);
        listView = (ListView) view.findViewById(R.id.listnewfeed);
        newFeeds = new ArrayList<>();
        newFeedAdp = new NewFeedAdp(newFeeds, getContext());
        listView.setAdapter(newFeedAdp);
        getdata();
        return view;
    }

    public void getdata() {
        RequestQueue requestQueue = Volley.newRequestQueue(getContext());
        JsonArrayRequest jsonArrayRequest = new JsonArrayRequest(Server.URLNewfeed, new Response.Listener<JSONArray>() {
            @Override
            public void onResponse(JSONArray response) {
                if (response != null) {
                    for (int i = 0; i < response.length(); i++) {
                        try {
                            JSONObject jsonObject = response.getJSONObject(i);
                            id_newfeed = jsonObject.getInt("id");
                            avatar_user = jsonObject.getString("avatar");
                            username_newfeed = jsonObject.getString("username");
                            status_newfeed = jsonObject.getString("status");
                            image_newfeed = jsonObject.getString("image");

                            newFeeds.add(new NewFeed(id_newfeed, avatar_user, username_newfeed, status_newfeed, image_newfeed));
                            newFeedAdp.notifyDataSetChanged();
                        } catch (JSONException e) {
                            e.printStackTrace();
                        }
                    }
                } else {
                    Toast.makeText(getContext(), "ko co data ", Toast.LENGTH_SHORT).show();
                }
            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {
                Toast.makeText(getContext(), "error: " + error.getMessage(), Toast.LENGTH_SHORT).show();
                Log.i("error1", error.getMessage());
            }
        });
        requestQueue.add(jsonArrayRequest);

    }

}
